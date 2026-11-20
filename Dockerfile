FROM php:8.3-cli-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    nodejs \
    npm \
    icu-dev \
    libzip-dev \
    linux-headers \
    mysql-client \
    sqlite-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd intl zip opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy dependency definition files
COPY composer.json composer.lock package.json package-lock.json ./

# Install dependencies
RUN composer install --no-dev --no-interaction --no-scripts --prefer-dist --optimize-autoloader
RUN npm ci

# Copy project files
COPY . .

# Build assets and dump autoload
RUN npm run build \
    && composer dump-autoload --optimize --no-dev

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache \
    && chmod +x start.sh

EXPOSE 8080

CMD ["./start.sh"]
