FROM php:7.2-apache

RUN apt-get update \
    && apt-get install -y nginx libpq-dev git zlib1g-dev unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV POSTGRES_USER 'USER'
ENV POSTGRES_PASS 'PASS'
ENV POSTGRES_HOST 'HOST'
ENV POSTGRES_PORT 'HOST'
ENV POSTGRES_DB   'DB'
ENV APP_ENV       'dev'
ENV APP_SECRET    'dev'

# Computed from above vars
ENV DATABASE_URL 'postgres://${POSTGRES_USER}:${POSTGRES_PASS}@${POSTGRES_HOST}:${POSTGRES_PORT/${POSTGRES_DB}'

# Point DocumentRoot to the app's public folder
ENV APP_HOME /app
ENV APP_DOCUMENT_ROOT /app/public
RUN sed -ri -e 's!/var/www/html!${APP_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APP_HOME}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /app
RUN chown www-data /app
COPY --chown=www-data . .

USER www-data
RUN composer install --no-dev

EXPOSE 80
