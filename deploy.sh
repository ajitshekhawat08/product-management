#!/bin/bash

echo "Starting Laravel deployment..."

if [ ! -f .env ]; then
    cp .env.example .env
fi

composer install

php artisan key:generate

php artisan migrate --force

php artisan optimize:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

npm install
npm run build

php artisan storage:link

echo "Deployment completed successfully!"
