<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'total_price',
        'customer_count'
    ];

    public function dishes() {
        return $this->belongsToMany(Dish::class, 'dish_orders')
                ->withPivot('dish_count')
                ->withTimestamps();
    }

    public function totalPrice(): Attribute
    {
        return Attribute::make(get: function ($value = 0) {
            foreach ($this->dishes as $dish) {
                $value += $dish->price * $dish->pivot->dish_count;
            }
            return $value;
        });
    }
}
