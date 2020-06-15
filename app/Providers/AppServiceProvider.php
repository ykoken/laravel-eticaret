<?php

namespace App\Providers;

use App\Models\Basket;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $data = [
                'cart' => Basket::join('products','products.id','=','basket.product_id')->where('user_id',Auth::user()->id)->where('sesid',Session::getId())->get(),
                'count' => Basket::where('user_id',Auth::user()->id)->where('sesid',Session::getId())->sum('amount')
            ];

            //...with this variable
            $view->with('data',$data);
        });

    }
}
