<?php

namespace App\Http\Controllers\Api;

// Models
use App\Models\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('dishes', 'typologies')->paginate('6');
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(string $slug){
        $restaurant = Restaurant::with('dishes', 'typologies')->where('slug', $slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}
