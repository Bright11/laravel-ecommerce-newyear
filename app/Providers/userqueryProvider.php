<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class userqueryProvider extends ServiceProvider
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
        //

            view()->composer('*',function($cart){
            if (Auth::user()) {
                $getcart=Cart::where('user_id',Auth::user()->id)->get();
                return $cart->with('getcartuser', $getcart);
            }
            });



            view()->composer('*', function ($view) {
            if (Auth::user()) {
            $countcart = Cart::where('user_id', Auth::user()->id)->count();
           // $countcart = Cart::count();
                return $view->with('countcart', $countcart);
            }else{
                $countcart=0;
                return $view->with('countcart', $countcart);
            }
            });
        //wishlist
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $wishlistcount = Wishlist::where('user_id', Auth::user()->id)->count();
                // $countcart = Cart::count();
                return $view->with('wishlistcount', $wishlistcount);
            } else {
                $wishlistcount = 0;
                return $view->with('wishlistcount', $wishlistcount);
            }
        });

        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $total = Cart::where('user_id', Auth::user()->id)->sum('price');
                // $countcart = Cart::count();
                return $view->with('total', $total);
            } else {
                $total = 0;
                return $view->with('total', $total);
            }
        });


        view()->composer('*', function ($view) {

            $getcat = Category::take(3)->get();
                // $countcart = Cart::count();
                return $view->with('getcat', $getcat);

        });

        //
//removeitem

    }
}
