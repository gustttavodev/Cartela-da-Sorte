<?php

namespace App\Providers;

use App\Interfaces\Sorteios\ISorteioRepository;
use App\Repositories\Sorteio\SorteioRepository;
use App\Services\Cartelas\CartelaService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->when(CartelaService::class)
            ->needs(ISorteioRepository::class)
            ->give(SorteioRepository::class);

    }
}
