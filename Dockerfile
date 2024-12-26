FROM php:8.2-fpm

WORKDIR /var/www

USER root

# Install library dan tools yang diperlukan
RUN apt-get update -y && apt-get install -y \
    default-mysql-client \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    curl \
    gnupg2 \
    lsb-release \
    ca-certificates \
    && curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs
    
# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# instalasi ekstensi php
RUN docker-php-ext-install gettext intl pdo_mysql gd
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Cek apakah grup 'www' sudah ada, jika tidak baru buat
RUN getent group www || groupadd -g 1000 www

# Buat user jika belum ada
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www

USER www

RUN composer install
RUN cp .env_example .env
RUN php artisan key:generate
RUN php artisan storage:link
RUN php artisan migrate --seed
RUN npm install
RUN npm run build

EXPOSE 9000
CMD [ "php-fpm" ]