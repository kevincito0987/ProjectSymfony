FROM php:7.4-apache-bullseye

USER root

# 1. Instalación de dependencias del SO
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libicu-dev libpng-dev libjpeg-dev libpq-dev \
    default-mysql-client libzip-dev \
    && docker-php-ext-install pdo pdo_mysql gd bcmath intl zip

# 2. Configuración de Apache (Apunta a la raíz de workspaces)
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /workspaces/web
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf \
    && sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/conf-available/*.conf

# 3. Composer manual (Para evitar líos de GLIBC)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 4. Preparar el espacio de trabajo (Solo workspaces)
WORKDIR /workspaces
RUN mkdir -p /workspaces

# Limpieza
RUN apt-get clean && rm -rf /var/lib/apt/lists/*