# استخدم صورة PHP 8.2 مع Composer
FROM php:8.2-cli

# تثبيت المكتبات اللازمة لـ Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# تعيين مجلد العمل
WORKDIR /app

# نسخ ملفات المشروع
COPY . .

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت مكتبات Laravel
RUN composer install --no-dev --optimize-autoloader

# تنفيذ المهاجرات والـ seeders (اختياري، ممكن تحذف السطر الأخير إذا ما بدك يتكرر)
RUN php artisan migrate --force && php artisan db:seed --force

# تشغيل السيرفر Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
