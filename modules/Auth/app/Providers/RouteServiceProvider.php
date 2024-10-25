<?php

namespace Modules\Auth\app\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
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
        Route::prefix('auth/api')
            ->middleware('api')
            ->group(__DIR__.'/../../routes/api.php');

        Route::prefix('auth')
            ->middleware('web')
            ->group(__DIR__.'/../../routes/web.php');
    }
}
