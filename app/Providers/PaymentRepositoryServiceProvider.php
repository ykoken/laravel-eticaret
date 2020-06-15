<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Payment\PaymentRepositoryInterface',
            'App\Repositories\Payment\PaymentRepository');
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
