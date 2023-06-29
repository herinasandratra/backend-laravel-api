FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#ENV COMPOSER_ALLOW_SUPERUSER=1
#RUN composer install --no-interaction
# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo_mysql
    
# Set up Apache document root
RUN mkdir -p /var/www/html/public
RUN chown -R www-data:www-data /var/www/html
#RUN ln -s /var/www/html/ /var/www/html/app/public


RUN sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/public/g' /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

# Enable Apache rewrite module
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
