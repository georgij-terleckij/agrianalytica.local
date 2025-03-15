
docker-compose exec app composer dump-autoload
docker-compose exec app php artisan migrate --seed
docker-compose exec app php artisan migrate:fresh --seed

docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan route:clear

docker-compose exec app php artisan db:seed --class=DatabaseSeeder
docker-compose exec app php artisan db:seed --class=RoleSeeder
docker-compose exec app php artisan db:seed --class=LandManagerSeeder

docker-compose exec app tail -f storage/logs/laravel.log

Генерируем секретный ключ для токенов:
<p>docker-compose exec app php artisan jwt:secret</p>


docker-compose down --volumes
docker-compose build --no-cache
docker-compose up -d
docker-compose restart

