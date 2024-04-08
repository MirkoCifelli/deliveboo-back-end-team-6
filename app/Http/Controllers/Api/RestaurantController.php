<?php

namespace App\Http\Controllers\Api;

// Models
use App\Models\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request){

        $slug = $request->input('slug');
        $typologies = $request->input('typologies');

        $restaurants = Restaurant::with('dishes', 'typologies')
        ->where('slug', 'like', "%$slug%")
        ->where('typologies', 'like', "%$typologies%")
        ->paginate('6');

        
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
