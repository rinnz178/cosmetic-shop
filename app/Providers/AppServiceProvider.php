<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Notifications\Channels\BroadcastChannel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewOrderNotification;

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
        view()->composer('*', function ($view) {
            $pendingOrders = Order::where('status', 'pending')->get();
            $view->with('pendingOrders', $pendingOrders);
        });

        
    }
}
