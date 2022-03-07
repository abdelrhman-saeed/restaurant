<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_id', 'resource_id'
    ];
}
