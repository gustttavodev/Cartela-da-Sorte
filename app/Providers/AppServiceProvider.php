<?php

namespace App\Providers;

use App\Interfaces\Cartelas\ICartela;
use App\Interfaces\Cartelas\ICartelaRepository;
use App\Interfaces\Sorteios\ISorteio;
use App\Interfaces\Sorteios\ISorteioRepository;
use App\Repositories\Cartela\CartelaRepository;
use App\Repositories\Sorteio\SorteioRepository;
use App\Services\Cartelas\CartelaService;
use App\Services\Sorteios\SorteioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICartela::class, CartelaService::class);
        $this->app->bind(ISorteio::class, SorteioService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->when(CartelaService::class)
            ->needs(ICartelaRepository::class)
            ->give(CartelaRepository::class);

        $this->app->when(SorteioService::class)
            ->needs(ISorteioRepository::class)
            ->give(SorteioRepository::class);
    }
}
