# Stage 1: Build frontend assets
FROM node:20 AS frontend
WORKDIR /app

# Copy file package.json dan package-lock.json
COPY package*.json ./

# Install dependencies Node tanpa error peer deps
RUN npm install --legacy-peer-deps

# Copy semua source code
COPY . .

# Build assets (ubah sesuai perintah build kamu, bisa "npm run build" atau "npm run prod")
RUN npm run build

# Stage 2: Laravel backend
FROM php:8.2-apache
WORKDIR /var/www/html

# Install PHP extensions untuk Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip unzip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath

# Copy Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy semua file dari stage frontend
COPY --from=frontend /app /var/www/html

# Install dependencies Laravel
RUN composer install --ignore-platform-reqs --no-dev --optimize-autoloader

# Set permission storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
