<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


use App\Repositories\Contracts\{
    UsuarioRepositoryInterface,
    AbstractRepositoryInterface,
    PlantaRepositoryInterface
};

use App\Repositories\{
    UsuarioRepository,
    AbstractRepository,
    PlantaRepository
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AbstractRepositoryInterface::class,
            AbstractRepository::class
        );

        $this->app->bind(
            UsuarioRepositoryInterface::class,
            UsuarioRepository::class
        );

        $this->app->bind(
            PlantaRepositoryInterface::class,
            PlantaRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
