<?php

namespace App\Providers;

use App\Http\Controllers\Cartela\CartelaController;
use App\Interfaces\Cartelas\ICartela;
use App\Services\Cartelas\CartelaService;
use Illuminate\Support\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
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
        //
    }
}
