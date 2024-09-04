FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install
RUN composer dump-autoload

RUN echo "DocumentRoot /var/www/html" >> /etc/apache2/sites-available/000-default.conf


EXPOSE 80

CMD ["apache2-foreground"]
