FROM php:8.3-fpm AS base
RUN apt-get update && apt-get install -y libzip-dev unzip \
 && docker-php-ext-install pdo pdo_mysql zip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY . .

FROM base AS test
RUN composer install --prefer-dist --no-interaction
# nesta imagem, tudo que o phpunit.xml e a suíte de testes precisam já está presente

FROM base AS production
RUN composer install --no-dev --optimize-autoloader --prefer-dist \
 && php artisan config:cache