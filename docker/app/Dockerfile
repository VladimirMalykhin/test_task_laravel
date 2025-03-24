FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Set the working directory
WORKDIR /var/www

# Copy the Laravel application to the container
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install