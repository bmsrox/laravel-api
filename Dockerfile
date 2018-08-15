FROM php:7.2.8

RUN apt update && \
    apt install -y git && \
    apt install -y unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer && \
    apt clean

WORKDIR /var/www/html

EXPOSE 3000

CMD php artisan serve --port=3000 --host=0.0.0.0