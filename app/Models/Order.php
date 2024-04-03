<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'custumer_name',
        'customer_lastname',
        'customer_address',
        'customer_phone',
        'customer_totale_price',
    ];

    protected $hidden = [
        'id'
    ];

    /*
        Relationships
    */

    // Many to Many with dishes
    public function dishes(){
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
}
