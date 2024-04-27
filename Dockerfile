# Use a imagem oficial do PHP 8.2 com Apache como base
FROM php:8.2-apache
# Instalar os pacotes necessários para o driver MySQL
RUN apt-get update && apt-get install -y \
        libpq-dev \
        libzip-dev \
        && docker-php-ext-install pdo pdo_mysql zip
        
RUN a2enmod rewrite
# Copie os arquivos do seu projeto para o diretório de trabalho no contêiner
COPY . /var/www/html/
