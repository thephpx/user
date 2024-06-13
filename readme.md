# User Module

## Installation

> composer require thephpx/user

## Post Installation Commands

> php artisan vendor:publish --provider="Thephpx\User\Providers\UserServiceProvider" --tag="config"
> php artisan vendor:publish --provider="Thephpx\User\Providers\UserServiceProvider" --tag="seeder"
> php artisan migrate
> php artisan db:seed --class="ThephpxUserDatabaseSeeder"

## Packages used 

- Fortify
- Laravel permissions