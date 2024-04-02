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

          $allOrders = Order::all();
          $allDishes = Dish::all();
          $allRestaurants = Restaurant::all();

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

        $orders = Order::all();
        $dishesIds = Dish::pluck('id')->toArray();
        foreach ($orders as $order) {
            $order->dishes()->sync(fake()->randomElements($dishesIds,fake()->numberBetween(1, 3)));
        }
    }
}
