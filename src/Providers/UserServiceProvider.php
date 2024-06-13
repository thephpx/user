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

    # Load config
    $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'User');

    # Publish assets
    $this->publishes([
      __DIR__.'/../../config/fortify.php' => config_path('fortify.php'),
      __DIR__.'/../../config/permission.php' => config_path('permission.php'),
    ], 'config');

    $this->publishes([
      __DIR__.'/../../database/seeders/ThephpxUserDatabaseSeeder.php' => database_path('seeders/ThephpxUserDatabaseSeeder.php'),
    ], 'seeder');

    # Register package
    $packages = \Illuminate\Support\Facades\Session::get('packages');
    if(empty($packages)){
      $packages = [];
    }

    $packages[] = 'thephpx/user';

    \Illuminate\Support\Facades\Session::put('packages', $packages);

    # Register navigation items
    $navigations = \Illuminate\Support\Facades\Session::get('navigations');
    if(empty($navigations)){
      $navigations = [];
    }

    $navigations[] = ['type'=>'route','label'=>'Dashboard','link'=>'dashboard.index','icon'=>'ti-home'];
    $navigations[] = ['type'=>'dropdown','label'=>'User Management','link'=>'javascript:;','icon'=>'ti-users-group','items'=>[
      ['type'=>'route','label'=>'Users','link'=>'user.index','icon'=>'ti-users-group'],
      ['type'=>'route','label'=>'Roles','link'=>'role.index','icon'=>'ti-circles'],
      ['type'=>'route','label'=>'Permissions','link'=>'permission.index','icon'=>'ti-key']
    ]];

    \Illuminate\Support\Facades\Session::put('navigations', $navigations);
  }
}