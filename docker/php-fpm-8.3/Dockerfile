FROM php:8.3-fpm

RUN apt-get update && apt-get install -y wget git unzip  \
    && apt-get install --yes --no-install-recommends libpq-dev zlib1g-dev libpng-dev libzip-dev \
    && docker-php-ext-install pdo_mysql gd zip opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
