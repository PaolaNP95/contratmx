<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Order;
use App\Item;
use Auth;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        $user=Auth::id();
        $total_quantity=Order::count('id');        
        $user_quantity=DB::table('orders')
                    ->join('users','users.id','=','orders.user_id')
                    ->where('user_id','LIKE',$user)
                    ->count();
        $item_registered=Item::with('stock')->with('category')->get();
       
        Schema::defaultStringLength(191);
        View::share('user_quantity', $user_quantity);
        View::share('total_quantity', $total_quantity);
        View::share('item_registered', $item_registered);
        
    }
}
