# Laravel в Docker: Полезные команды

## 📦 Установка зависимостей
```sh
docker-compose exec app composer dump-autoload
```

## 🎲 Работа с миграциями и сидерами
```sh
docker-compose exec app php artisan migrate --seed
# Полный сброс и наполнение базы
docker-compose exec app php artisan migrate:fresh --seed
```

## 🔄 Очистка кеша и маршрутов
```sh
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan route:clear
```

## 📥 Заполнение базы данными (сидеры)
```sh
docker-compose exec app php artisan db:seed --class=DatabaseSeeder
docker-compose exec app php artisan db:seed --class=RoleSeeder
docker-compose exec app php artisan db:seed --class=LandManagerSeeder
```

## 📜 Просмотр логов Laravel в реальном времени
```sh
docker-compose exec app tail -f storage/logs/laravel.log

docker-compose logs -f vite

```

## 🔑 Генерация секретного ключа для JWT
```sh
docker-compose exec app php artisan jwt:secret
```

## 🏗️ Запуск Artisan внутри контейнера
```sh
docker-compose exec app php artisan list | Select-String "front"
```

## 📦 Обновление зависимостей
```sh
docker-compose exec app composer update agrianalytica/front-end
```

## 🎨 Публикация ассетов
```sh
docker-compose exec app php artisan vendor:publish --tag=public
```

## 🚀 Управление контейнерами Docker
```sh
docker-compose down --volumes  # Остановка и удаление всех томов
docker-compose build --no-cache # Пересборка образов без кеша
docker-compose up -d  # Запуск контейнеров в фоновом режиме
docker-compose restart  # Перезапуск контейнеров
