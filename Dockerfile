FROM php:8.3-cli

RUN docker-php-ext-install pdo_mysql mysqli

RUN apt-get update && apt-get install -y unzip git && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
