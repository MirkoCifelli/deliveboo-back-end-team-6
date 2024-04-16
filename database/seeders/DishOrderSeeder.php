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

        $restaurant = $restaurants->random();
        
        foreach ($orders as $order){

            // prendiamo un ristorante casuale
            $restaurant = $restaurants->random();

            // prendiamo un numero casuale (1-5) di piatti dal ristorante 
            $restaurantDishes = $restaurant->dishes()->inRandomOrder()->take(rand(2, 5))->get();

            // settiamo una quantità casuale
            $quantity = rand(1, 5);

            // alleghiamo i piatti dello stesso ristorante (tramite la funzione PLUCK ...)  all'ordine corrente  
            $order->dishes()->attach($restaurantDishes->pluck('id'), ['quantity' => $quantity]);

        }  
    }
}

