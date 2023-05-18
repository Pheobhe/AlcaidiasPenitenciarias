FROM php:8.1.4-fpm AS base

ARG UID=1000
ARG GID=1000

ENV UID=${UID}
ENV GID=${GID}

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libgmp-dev \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip gmp intl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN addgroup -gid ${GID} --system laravel -q
RUN adduser --gid ${GID} --shell /bin/ash --uid ${UID} laravel -q

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# Agregando Helthcheck

# ADD  https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck /usr/local/bin/php-fpm-healthcheck

# RUN chmod +x /usr/local/bin/php-fpm-healthcheck; \
#     set -xe && echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# Retoques de php
COPY docker/php/php.ini /usr/local/etc/php/php.ini

# Agregando Timezone Argentino
ENV TZ=America/Argentina/Buenos_Aires
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone;

# Agregando entrypoint
COPY docker/php/docker-entrypoint /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint;

# Set working directory
WORKDIR /srv/sistema
RUN chmod 777 /srv/sistema

USER laravel

# Configuracion composer dev/prod
COPY ./composer.json ./composer.lock ./

ENV COMPOSER_ALLOW_SUPERUSER=1

ARG APP_ENV=prod
ARG COMPOSER_NO_DEV=1

ENV APP_ENV=${APP_ENV}
ENV COMPOSER_NO_DEV=${COMPOSER_NO_DEV}

RUN set -eux; \
        composer install --no-progress --no-scripts


# Agregando archivos del proyecto
COPY --chown=laravel . ./

RUN chmod 777 -R /srv/sistema/storage /srv/sistema/bootstrap

ENTRYPOINT ["docker-entrypoint"]

# CMD ["php-fpm"]
CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

