# Use a base PHP image
FROM php:8.3-fpm-alpine

# Install PHP extensions and dependencies
RUN apk add --no-cache \
    bash \
    icu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    mariadb-client \
    && docker-php-ext-install \
        intl \
        pdo \
        pdo_mysql \
        mysqli \
        zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code into the container
COPY . /var/www/html

# Install composer dependencies
RUN composer install --no-interaction

# RUN cp -r web/wp /wp-core-backup
