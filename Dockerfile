FROM php:7.4-apache
COPY src/ /var/www/html/
EXPOSE 80
RUN docker-php-ext-install mysqli
