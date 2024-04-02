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
        // Schema::withoutForeignKeyConstraints(function () {
        // });

        //   $allOrders = Order::all();
        //   $allDishes = Dish::all();
        //   $allRestaurants = Restaurant::all();

        // $RestaurantsId = [];
        // foreach ($allRestaurants as $key => $singleRestaurant) {
        //     $RestaurantsId[]=$singleRestaurant->id;
        // }
        // dd($RestaurantsId);

        // // dd($allDishes[1]->restaurant_id);

        // foreach ($allOrders as $key => $singleOrder) {
        //     // in base agli ordini che abbiamo inserire nella colonna order id 
        //     // tanti id casuali quanti gli ordini

        //     $orderIndex = random_int(1,count($allOrders));
        //     $dishesIndex = random_int(1,count($allDishes));
        //     $RestaurantsIndex = random_int(1,count($allDishes));

        //     // dd($RandomIndex,$DishesIndex);

            
        //     DB::table('dish_order')->insert([
        //         [
        //             'order_id' => $orderIndex,
        //             'dish_id' => $dishesIndex,
        //             'quantity' => fake()->randomDigitNotNull(),
        //         ]
        //     ]);

        // }
        // Ottenere tutti gli ID dei piatti
        $dishIds = Dish::pluck('id')->toArray();

        // Ottenere tutti gli ID degli ordini
        $orderIds = Order::pluck('id')->toArray();

        // Generare un numero casuale di piatti e ordini da associare
        $numDishes = count($dishIds);
        $numOrders = count($orderIds);

        // Definire la quantità massima e minima per ciascun piatto nell'ordine
        $minQuantity = 1;
        $maxQuantity = 5;

        foreach ($orderIds as $orderId) {
            // Ottenere l'ID del ristorante associato all'ordine corrente
            $restaurantId = Order::find($orderId)->restaurant_id;
        
            // Ottenere gli ID dei piatti appartenenti al ristorante dell'ordine corrente
            $restaurantDishIds = Dish::where('restaurant_id', $restaurantId)->pluck('id')->toArray();
        
            // Verificare se ci sono piatti disponibili per il ristorante corrente
            if (!empty($restaurantDishIds)) {
                // Scegliere casualmente un piatto dal ristorante corrente
                $randomDishId = $restaurantDishIds[array_rand($restaurantDishIds)];
        
                // Generare una quantità casuale tra $minQuantity e $maxQuantity
                $quantity = rand($minQuantity, $maxQuantity);
        
                // Salvare l'associazione nella tabella pivot
                DB::table('dish_order')->insert([
                    'dish_id' => $randomDishId,
                    'order_id' => $orderId,
                    'quantity' => $quantity,
                ]);
            } else {
                // Gestire il caso in cui non ci sono piatti disponibili per il ristorante corrente
                // Ad esempio, puoi semplicemente ignorare questo ordine o gestire l'errore in modo appropriato.
                // Qui puoi aggiungere il codice per gestire questa situazione.
                continue; // Salta questo ordine e passa al successivo
            }
        }            
    }    
}

