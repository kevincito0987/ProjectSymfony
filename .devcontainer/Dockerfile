FROM mcr.microsoft.com/devcontainers/php:1-8.4-bullseye
USER root

# 1. Limpieza de repositorios problemáticos (Yarn) y actualización de dependencias del SO
RUN rm -f /etc/apt/sources.list.d/yarn.list \
    && apt-get update && apt-get install -y --no-install-recommends \
    git unzip zip curl libpq-dev libicu-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libssl-dev ca-certificates sudo docker.io \
 && update-ca-certificates \
 && rm -rf /var/lib/apt/lists/*

# 2. Configuración de Docker Compose V2 (Binario directo)
RUN curl -SL https://github.com/docker/compose/releases/download/v2.24.5/docker-compose-linux-x86_64 -o /usr/local/bin/docker-compose \
    && chmod +x /usr/local/bin/docker-compose \
    && ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose

# 3. Permisos para el usuario vscode
RUN usermod -aG docker vscode

# 4. Extensiones de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j"$(nproc)" bcmath intl pdo pdo_mysql pdo_pgsql zip gd exif pcntl sockets

# 5. Instalación limpia de Node 20 y pnpm (evitando conflictos de repo)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
 && apt-get install -y nodejs \
 && npm i -g pnpm@9 \
 && rm -rf /var/lib/apt/lists/*

# Config PHP (Asegúrate de que estas rutas existan en tu repo)
COPY .devcontainer/php.ini /usr/local/etc/php/conf.d/zz-dev.ini
COPY .devcontainer/xdebug.ini /usr/local/etc/php/conf.d/zz-xdebug.ini

# Unifica ruta de trabajo con devcontainer.json
WORKDIR /workspaces

# Ajuste de permisos final
RUN chown -R vscode:vscode /workspaces

USER vscode