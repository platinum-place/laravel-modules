<?php

namespace Modules\Auth\app\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Auth\app\Http\Middleware\EnsureEmailIsVerified;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app['router']->aliasMiddleware('verified', EnsureEmailIsVerified::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(__DIR__.'/../../routes/api.php');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
