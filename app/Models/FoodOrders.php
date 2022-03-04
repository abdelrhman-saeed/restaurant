<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id', 'order_id', 'food_quantity'
    ];
}
