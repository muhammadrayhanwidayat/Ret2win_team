# Gunakan image resmi PHP dengan server Apache
FROM php:8.2-apache

# Salin semua file dari folder src lokal ke folder web server di dalam container
COPY src/ /var/www/html/

# Aktifkan modul rewrite Apache (opsional tapi praktik yang baik)
RUN a2enmod rewrite

# Server akan berjalan di port 80 di dalam container
EXPOSE 80
