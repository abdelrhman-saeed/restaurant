<?php

namespace App\Models;

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
}
