<?php

namespace Modules\Auth\modules\Authorization\app\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/permission.php', 'permission');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
