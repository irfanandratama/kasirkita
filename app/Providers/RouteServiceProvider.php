<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCashierRoutes();

        $this->mapManagementRoutes();

        $this->mapManejemanRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "cashier" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCashierRoutes()
    {
        Route::prefix('cashier')
            ->middleware('cashier')
            ->namespace($this->namespace.'\\Cashier')
            ->group(base_path('routes/cashier/cashier.php'));
    }

    /**
     * Define the "management" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapManagementRoutes()
    {
        Route::prefix('management')
            ->middleware('management')
            ->namespace($this->namespace.'\\Management')
            ->group(base_path('routes/management/management.php'));
    }

    /**
     * Define the "manejeman" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapManejemanRoutes()
    {
        Route::prefix('manejeman')
            ->middleware('manejeman')
            ->namespace($this->namespace.'\\Manejeman')
            ->group(base_path('routes/manejeman/manejeman.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('admin')
            ->namespace($this->namespace.'\\Admin')
            ->group(base_path('routes/admin/admin.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
