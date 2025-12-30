FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    unzip zip git curl libzip-dev \
    libpng-dev libonig-dev libxml2-dev \
    npm gnupg && \
    docker-php-ext-install pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@latest

WORKDIR /var/www/html
