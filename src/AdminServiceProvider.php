<?php

namespace Molovo\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'admin');

        // use this if your package has routes
        $this->setupRoutes($this->app->router);

        // use this if your package needs a config file
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('admin.php'),
        ]);

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'admin'
        );

        $this->publishes( [
            __DIR__.'/resources/assets/dist' => public_path( 'vendor/molovo/admin' )
        ], 'public' );
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group( [ 'namespace' => 'Molovo\Admin\Http\Controllers' ], function( $router )
        {
            require __DIR__.'/Http/routes.php';
        } );
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAdmin();

        // use this if your package has a config file
        config([
                'config/admin.php',
        ]);
    }

    private function registerAdmin()
    {
        $this->app->bind('admin',function($app){
            return new Admin($app);
        });
    }
}