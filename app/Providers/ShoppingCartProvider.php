<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\ShoppingCart;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $session_name = 'shopping_cart_id';
            $shopping_cart_id = Session::get($session_name);
            $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);
            Session::put($session_name, $shopping_cart->id);
            $view->with('shopping_cart', $shopping_cart);
        });
    }
}
