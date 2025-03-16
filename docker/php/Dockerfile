FROM php:8.1-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    zip unzip curl git \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем Node.js 20 и последнюю версию npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Запуск composer dump-autoload при старте контейнера
CMD composer dump-autoload && php-fpm