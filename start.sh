#!/bin/sh
set -e

# Run storage link if not created
php artisan storage:link || true

# If using sqlite or no DB_HOST set, fallback safely to local sqlite
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_HOST" ]; then
    echo "Configuring SQLite database..."
    mkdir -p database
    touch database/database.sqlite
    export DB_CONNECTION=sqlite
    export DB_DATABASE=/app/database/database.sqlite
fi

# Run database migrations and seeders if enabled
if [ "$RUN_MIGRATIONS" = "true" ] || [ "$RUN_MIGRATIONS" = "1" ]; then
    echo "Running database migrations..."
    php artisan migrate --force --seed || php artisan migrate --force || true
fi

# Cache configurations for production speed
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Laravel server on port ${PORT:-8080}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
