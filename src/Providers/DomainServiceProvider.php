<?php

namespace Blit\Domains\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $langDir        = __DIR__ . '/../Lang';
        $routeDir       = __DIR__ . '/../Routes/web.php';
        $configDir      = __DIR__ . '/../Config/blit-domains.php';
        $migrationsDir  = __DIR__ . '/../Migrations';
        $viewsDir       = __DIR__ . '/../Views';
        $publicDir      = __DIR__ . '/../assets';

        Route::namespace("Blit\\Domains\\Http\\Controllers")
        ->middleware(config('BlitDomains.route_middleware'))
        ->group($routeDir);

        $this->loadMigrationsFrom($migrationsDir);
        $this->loadTranslationsFrom($langDir,'BlitDomains');
        $this->loadViewsFrom($viewsDir,'BlitDomains');

        $this->publishes([$langDir => resource_path('lang/vendor/BlitDomains')],'BlitDomains-lang');
        $this->publishes([$viewsDir => resource_path('views/vendor/BlitDomains')],'BlitDomains-views');
        $this->publishes([$publicDir => public_path('vendor/BlitDomains')],'BlitDomains-assets');
        $this->publishes([$configDir => config_path('blit-domains.php')],'BlitDomains-config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/blit-domains.php','BlitDomains');
    }
}