# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Install necessary extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libsqlite3-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install \
    intl \
    pdo_sqlite \
    zip

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install composer and dependencies
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer config --no-plugins allow-plugins.kylekatarnls/update-helper false \ 
    && rm composer.lock && composer install --no-dev --optimize-autoloader

# Allow .env file to be visible
RUN mv .env.example .env

# Generate application key & Run database migration
RUN php artisan key:generate \
    && touch /var/www/html/lara2019.db && php artisan migrate

# Expose port 80 and start php-fpm
EXPOSE 80
CMD php artisan serve --port 80 --host 0.0.0.0