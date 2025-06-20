FROM php:8.1-apache

COPY . /var/www/html/

# Tambahkan handler .php5
RUN echo "AddHandler application/x-httpd-php .php .php5" >> /etc/apache2/apache2.conf

# Buat folder uploads, set permission + ownership
RUN mkdir -p /var/www/html/uploads && \
    chmod 755 /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod +x /var/www/html/upload.php /var/www/html/list_uploads.php

# Bolehkan akses uploads
RUN echo "<FilesMatch \".*\">" > /var/www/html/uploads/.htaccess && \
    echo "  Require all granted" >> /var/www/html/uploads/.htaccess && \
    echo "</FilesMatch>" >> /var/www/html/uploads/.htaccess

EXPOSE 80
CMD ["apache2-foreground"]
