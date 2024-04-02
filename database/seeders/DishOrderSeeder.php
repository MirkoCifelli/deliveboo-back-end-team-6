<?php

namespace Database\Seeders;

// Models
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;

// Helpers
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Creare alcuni ordini
        $orders = Order::all();

        // Associare casualmente i piatti di ciascun ristorante agli ordini
            $orders->each(function ($order) {
            // Scegliere casualmente un ristorante
            $restaurant = Restaurant::inRandomOrder()->first();

            // Selezionare alcuni piatti solo da questo ristorante
            $dishes = $restaurant->dishes()->inRandomOrder()->limit(rand(1, 3))->get();

            // Associare i piatti selezionati all'ordine
            $dishes->each(function ($dish) use ($order) {
                $existingPivot = $order->dishes()->where('dish_id', $dish->id)->first();
                if ($existingPivot) {
                    // Se il piatto è già presente nell'ordine, aumentare la quantità
                    $existingPivot->pivot->increment('quantity');
                } else {
                    // Altrimenti, aggiungere il piatto con quantità 1
                    $order->dishes()->attach($dish->id, ['quantity' => 1]);
                }
            });
        });
                   
    }
}

