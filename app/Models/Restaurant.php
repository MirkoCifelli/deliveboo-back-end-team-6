<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'slug',
        'address',
        'vat_number',
        'img',
        'visible',
        'user_id'
    ];

    // per le chiamate API 
    protected $hidden = [
        'id',
        'user_id',
    ];



    //Relationships 
    public function user(){
        return $this->belongsTo(User::class);
    }


}
