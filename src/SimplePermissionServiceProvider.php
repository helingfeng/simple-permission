<?php

namespace SimplePermission;


use Illuminate\Support\ServiceProvider;

class SimplePermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/2019_04_04_022828_create_laravel_users_table.php' => $this->getMigrationFilePath('2019_04_04_022828_create_laravel_users_table'),
            __DIR__.'/../database/migrations/2019_04_04_022925_create_laravel_roles_table.php' => $this->getMigrationFilePath('2019_04_04_022925_create_laravel_roles_table'),
            __DIR__.'/../database/migrations/2019_04_04_023002_create_laravel_users_permissions_table.php' => $this->getMigrationFilePath('2019_04_04_023002_create_laravel_users_permissions_table'),
            __DIR__.'/../database/migrations/2019_04_04_023047_create_laravel_users_roles_table.php' => $this->getMigrationFilePath('2019_04_04_023047_create_laravel_users_roles_table'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/LaravelUsersSeeder.php' => $this->getSeedsFilePath('LaravelUsersSeeder'),
        ], 'seeds');

        $this->publishes([
            __DIR__.'/../config/permission.php' => config_path('permission.php'),
            __DIR__.'/../config/menu.php' => config_path('menu.php'),
        ], 'config');

        $this->commands([
            Commands\UserCommand::class,
            Commands\MenuCommand::class,
            Commands\PermissionCommand::class,
        ]);
    }

    public function register()
    {

    }

    protected function getMigrationFilePath($filename): string
    {
        return $this->app->databasePath()."/migrations/{$filename}.php";
    }

    protected function getSeedsFilePath($filename): string
    {
        return $this->app->databasePath()."/seeds/{$filename}.php";
    }
}