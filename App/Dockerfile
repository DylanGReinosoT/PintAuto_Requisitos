FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
