# Stage 1: Build Frontend
FROM node:20 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install --legacy-peer-deps
COPY . .
RUN npm run build

# Stage 2: Backend Laravel
FROM php:8.2-apache
WORKDIR /var/www/html

# Install dependencies PHP (opsional sesuai kebutuhan Laravel)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copy Laravel files
COPY --from=frontend /app /var/www/html

# Install Composer dependencies
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --ignore-platform-reqs --no-dev --optimize-autoloader
