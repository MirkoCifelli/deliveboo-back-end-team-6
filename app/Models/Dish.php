<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'img',
        'description',
        'price',
        'visible',
        'resturant_id'
    ];

    protected $hidden = [
        'id',
        'resturant_id'
    ];

    /*
        Relationships
    */

    // One to Many with resturants
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    // Many to Many with orders
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
