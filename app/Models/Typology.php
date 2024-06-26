<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img'
    ];

    protected $hidden = [
        'id',
    ];
/*
        Relationships
    */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }}
