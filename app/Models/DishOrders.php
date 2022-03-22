<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DishOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_id',
        'order_id',
        'dish_count'
    ];

    public function bestDishes(): Attribute
    {
        return Attribute::make(get: function ()
        {
            return self::join('dishes', 'dish_orders.dish_id', '=', 'dishes.id')
                        ->select('dishes.name', 'dishes.price', DB::raw('SUM(dish_count) as times'))
                        ->groupBy('dish_orders.dish_id')
                        ->orderByDesc('times')
                        ->limit(3)
                        ->get();
        });
    }

    public function totalIncome(): Attribute
    {
        return Attribute::make(get: function () {

            return self::join('dishes', 'dish_orders.dish_id', '=', 'dishes.id')
                        ->select('dishes.price', DB::raw('(dish_count * dishes.price) as order_total_price'))
                        ->get()
                        ->sum('order_total_price');
        });
    }

    public function totalIncomeByToday(): Attribute
    {
        return Attribute::make(get: function () {

            return self::join('dishes', 'dish_orders.dish_id', '=', 'dishes.id')
                        ->select('dishes.price', DB::raw('(dish_count * dishes.price) as order_total_price'))
                        ->whereDate('dish_orders.created_at', Carbon::today())
                        ->get()
                        ->sum('order_total_price');
        });
    }

}
