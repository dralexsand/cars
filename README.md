# cars


```
composer create-project --prefer-dist laravel/laravel cars

cd cars

composer require laravel/ui

php artisan ui vue

npm install && npm run dev

configure RouteServiceProvider for api, web, user, admin groups routes 
```

####Create models with migrations:

```
php artisan make:model Car -m
php artisan make:model Brand -m
php artisan make:model Carmodel -m
php artisan make:model Color -m
php artisan make:model Transmission -m
php artisan make:model Photo -m

php artisan migrate
```

####Create seeders with models:

```
php artisan make:seeder CarSeeder
php artisan make:seeder BrandSeeder
php artisan make:seeder CarmodelSeeder
php artisan make:seeder ColorSeeder
php artisan make:seeder TransmissionSeeder

```

####mkdir Traits in app directory

####create trait SeederDataTrait in new file SeederDataTrait.php

####Add 'use SeederDataTrait' in TransmissionSeeder, CarmodelSeeder, BrandSeeder, CarSeeder

```
composer dump-autoload
```

####configure seeders
####run seeders

```
php artisan db:seed --class=TransmissionSeeder
php artisan db:seed --class=BrandSeeder
php artisan db:seed --class=ColorSeeder
php artisan db:seed --class=CarmodelSeeder
php artisan db:seed --class=CarSeeder
```













