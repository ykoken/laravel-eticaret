<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BasketRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Basket\BasketRepositoryInterface',
            'App\Repositories\Basket\BasketRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
