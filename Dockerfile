# صورة PHP مع Composer
FROM php:8.2-cli

# تثبيت المكتبات اللازمة
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# نسخ ملفات المشروع
WORKDIR /app
COPY . .

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت مكتبات Laravel
RUN composer install --no-dev --optimize-autoloader

# تنفيذ المهاجرات والـ seeders
RUN php artisan migrate --force && php artisan db:seed --force

# تشغيل السيرفر
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
