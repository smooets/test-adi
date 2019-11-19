<?php

namespace App\Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            '\App\Modules\Product\Repositories\Contracts\ProductRepositoryInterface',
            '\App\Modules\Product\Repositories\ProductRepository'
        );
    }
}
