# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Instala git, unzip, y extensiones necesarias de PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && docker-php-ext-install pdo pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos de tu proyecto al directorio de trabajo en el contenedor
COPY . /var/www/html/

# Define el directorio de trabajo
WORKDIR /var/www/html/

# Instala las dependencias de PHP con Composer
RUN composer install --prefer-dist --no-interaction --no-plugins --no-scripts

# Exponer el puerto 80 para el servidor web
EXPOSE 80

# Comando para iniciar Apache en segundo plano
CMD ["apache2-foreground"]
