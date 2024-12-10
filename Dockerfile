FROM php:8.1-fpm

RUN apt update && apt install -y \
    git \
    curl \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && apt clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./

#RUN composer install --no-interaction --prefer-dist

COPY . .

RUN composer update

RUN php artisan key:generate && \
    php artisan migrate && \
    php artisan db:seed --force



EXPOSE 8100

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8100"]
