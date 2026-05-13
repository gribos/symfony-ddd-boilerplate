FROM php:8.4-fpm-alpine

# System dependencies
RUN apk add --no-cache \
    postgresql-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    icu-dev \
    linux-headers \
    $PHPIZE_DEPS

# PHP extensions
RUN docker-php-ext-install \
    pdo_pgsql \
    pgsql \
    zip \
    intl \
    opcache

# Xdebug (dev only)
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Symfony CLI (optional, useful for local dev)
RUN apk add --no-cache bash && \
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && \
    apk add symfony-cli

WORKDIR /var/www/html

# Permissions
RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www
