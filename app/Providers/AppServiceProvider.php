<?php

namespace App\Providers;

use App\Models\DishOrders;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        View::share([
            'bestDishes'        => ( $dishOrders = new DishOrders )->bestDishes,
            'visitorsByToday'   => Order::all()->sum('customer_count'),
            'totalOrders'       => Order::count(),
            'incomeByToday'     => $dishOrders->totalIncomeByToday,
            'totalIncome'       => $dishOrders->totalIncome,
        ]);
    }
}
