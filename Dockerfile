FROM php:7.0-apache
COPY wordpress/ /var/www/html/
COPY voyageuw /var/www/html/wp-content/themes
