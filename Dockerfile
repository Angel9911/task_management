# Use PHP 8.1 with FPM
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libssl-dev \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www

# Set correct permissions
RUN chown -R www-data:www-data /var/www

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Ensure vendor directory is there
RUN ls -lah /var/www/vendor || (echo "Vendor directory is missing!" && exit 1)

# Expose the correct port (Fly.io expects your app to listen on PORT)
EXPOSE 8080

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]