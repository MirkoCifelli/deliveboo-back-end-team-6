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

        $restaurants = Restaurant::with('dishes', 'typologies');

        if(isset($slug)){
            $restaurants->where('slug', 'like', "%$slug%");
        }

        if(isset($typologies)){
            $restaurants->whereHas('typologies', function ($query) use ($typologies) {
                $query->whereIn('name', $typologies);
            });
        }

        $results = $restaurants->get();


        
        return response()->json([
            'success' => true,
            'results' => $results
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
