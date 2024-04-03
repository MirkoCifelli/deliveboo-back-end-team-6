<?php

namespace Database\Seeders;

// Models
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;

// Helpers
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $restaurants = Restaurant::all();
        
        $orders = Order::all();

        foreach ($orders as $order){

            $restaurant = $restaurants->random();

            $restaurantDishes = $restaurants->dishes()->inRandomOrder()->take(rand(2, 5))->get();
            $quantity = rand(1, 5);
            $order->dishes()->attach($restaurantDishes->pluck('id'), ['quantity' => $quantity]);

        }

        
                   
    }
}

