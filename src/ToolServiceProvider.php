<?php

namespace Leuverink\ForgeServer;

use Laravel\Nova\Nova;
use Themsaid\Forge\Forge;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Leuverink\ForgeServer\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $this->publishes([
             __DIR__ . '/../config/nova-forge-server.php' => base_path('config/nova-forge-server.php'),
        ], 'nova-forge-server:config');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'forge-server');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/forge-server')
                ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-forge-server.php', 'nova-forge-server');
        
        // We only need this inside the contollers anyway...
        $this->app->singleton(Forge::class, function () {
            return new Forge(Config::get('nova-forge-server.api_key'));
        });
    }
}
