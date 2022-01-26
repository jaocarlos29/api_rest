<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


use App\Repositories\Contracts\{
    UsuarioRepositoryInterface,
    AbstractRepositoryInterface,
    PlantaRepositoryInterface,
    TalhaoRepositoryInterface
};

use App\Repositories\{
    UsuarioRepository,
    AbstractRepository,
    PlantaRepository,
    TalhaoRepository
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

        $this->app->bind(
            TalhaoRepositoryInterface::class,
            TalhaoRepository::class
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
