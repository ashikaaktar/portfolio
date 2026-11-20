# ASHIKA Portfolio – Production Deployment Guide

This guide details step-by-step instructions for deploying the **ASHIKA** personal portfolio application to a production server (Ubuntu/Debian, VPS, AWS, DigitalOcean, or cPanel).

---

## 1. System Requirements

* **Operating System:** Linux (Ubuntu 22.04 / 24.04 LTS recommended)
* **Web Server:** Nginx or Apache 2.4+
* **PHP:** PHP 8.3 or higher with extensions:
  * `php8.3-fpm`, `php8.3-cli`, `php8.3-mysql`, `php8.3-mbstring`, `php8.3-xml`, `php8.3-curl`, `php8.3-zip`, `php8.3-gd`, `php8.3-intl`, `php8.3-bcmath`
* **Database:** MySQL 8.0+ or MariaDB 10.6+
* **Dependency Managers:**
  * Composer 2.x
  * Node.js 18+ & NPM

---

## 2. Server Setup & Dependencies (Ubuntu Example)

```bash
# Update system packages
sudo apt update && sudo apt upgrade -y

# Install PHP 8.3 and extensions
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.3 php8.3-fpm php8.3-cli php8.3-mysql php8.3-curl \
    php8.3-gd php8.3-mbstring php8.3-xml php8.3-zip php8.3-bcmath php8.3-intl \
    nginx mysql-server git unzip curl

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js & NPM (NodeSource)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

---

## 3. Clone Repository & Install Application

```bash
# Clone the project into webroot
cd /var/www
sudo git clone <your-git-repository-url> ashika-portfolio
cd /var/www/ashika-portfolio

# Install Composer production dependencies
composer install --no-dev --optimize-autoloader

# Install NPM dependencies & build assets
npm ci
npm run build
```

---

## 4. Environment Configuration

Copy the production `.env`:

```bash
cp .env.example .env
```

Configure your `.env` for production:

```ini
APP_NAME="ASHIKA"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://ashika.me

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ashika_portfolio
DB_USERNAME=ashika_user
DB_PASSWORD=YOUR_STRONG_PASSWORD_HERE

SESSION_DRIVER=database
SESSION_LIFETIME=120

CACHE_STORE=database
QUEUE_CONNECTION=database
```

Generate the application encryption key:

```bash
php artisan key:generate
```

---

## 5. Database Setup, Migrations & Seeding

Log into MySQL and create the database & dedicated user:

```sql
CREATE DATABASE ashika_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'ashika_user'@'localhost' IDENTIFIED BY 'YOUR_STRONG_PASSWORD_HERE';
GRANT ALL PRIVILEGES ON ashika_portfolio.* TO 'ashika_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Run migrations and initial seed data:

```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 6. Storage Symlink & File Permissions

```bash
# Create storage symlink for uploaded media
php artisan storage:link

# Set proper ownership and permissions
sudo chown -R www-data:www-data /var/www/ashika-portfolio
sudo find /var/www/ashika-portfolio -type f -exec chmod 644 {} \;
sudo find /var/www/ashika-portfolio -type d -exec chmod 755 {} \;
sudo chmod -R 775 /var/www/ashika-portfolio/storage /var/www/ashika-portfolio/bootstrap/cache
```

---

## 7. Performance Caching

Run production optimization commands:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan filament:optimize
```

---

## 8. Nginx Virtual Host Configuration

Create `/etc/nginx/sites-available/ashika.me`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name ashika.me www.ashika.me;
    root /var/www/ashika-portfolio/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff|woff2|ttf|svg)$ {
        expires 30d;
        add_header Cache-Control "public, no-transform";
    }
}
```

Enable site and test Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/ashika.me /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

---

## 9. SSL Certificate Setup (Let's Encrypt / Certbot)

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d ashika.me -d www.ashika.me
```

---

## 10. Admin Access & Post-Deploy Verification

1. **Website:** `https://ashika.me`
2. **Admin Control Panel:** `https://ashika.me/admin`
   * **Initial Admin Email:** `admin@ashika.com`
   * **Default Password:** `password` *(Change immediately upon first login)*
3. **Automated Cron Jobs (crontab):**
   ```bash
   crontab -e
   ```
   Add:
   ```bash
   * * * * * cd /var/www/ashika-portfolio && php artisan schedule:run >> /dev/null 2>&1
   ```
