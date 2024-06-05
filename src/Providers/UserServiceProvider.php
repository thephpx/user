<?php

namespace Thephpx\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    # Load model relations 
    
    # Load routes
    $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

    # Load views
    $this->loadViewsFrom(__DIR__.'/../../resources/views', 'User');

    # Load migration tables
    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
  }
}