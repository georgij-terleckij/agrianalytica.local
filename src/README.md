
docker-compose exec app composer dump-autoload
docker-compose exec app php artisan migrate

docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear

docker-compose down --volumes
docker-compose build --no-cache
docker-compose up -d
docker-compose restart

