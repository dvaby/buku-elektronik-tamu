composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install

Akses
http://127.0.0.1:8000