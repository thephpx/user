# User Module

## Installation

> composer require thephpx/user

## Post Installation Commands

> php artisan vendor:publish --provider="Thephpx\User\Providers\UserServiceProvider" --tag="config"
> php artisan vendor:publish --provider="Thephpx\User\Providers\UserServiceProvider" --tag="seeder"
> php artisan migrate
> php artisan db:seed --class="ThephpxUserDatabaseSeeder"

- make sure in config/auth.php the user model points the this packages user model
> 'model' => env('AUTH_MODEL', Thephpx\User\Models\User::class)

## Packages used 

- Fortify
- Laravel permissions