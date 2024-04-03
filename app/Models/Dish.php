<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{   
    //importiamo il trait soft delete
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'img',
        'description',
        'price',
        'visible',
        'restaurant_id'
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
        return $this->belongsTo(Restaurant::class);
    }

    // Many to Many with orders
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
