<?php

namespace Modules\Authentication\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Authentication\app\Http\Middleware\EnsureEmailIsVerified;

class MiddlewareServiceProvider extends ServiceProvider
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
        //
    }
}
