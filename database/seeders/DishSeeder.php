<?php

namespace Database\Seeders;

// Models
use App\Models\Dish;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        Schema::withoutForeignKeyConstraints(function () {
            Dish::truncate();
        });

        $dishes = config('dishes.dishes');

        $restaurantId = null;


        foreach ($dishes as $singleDish) {

            $dish = Dish::create([
                'name' => $singleDish['name'],
                'slug' => str()->slug($singleDish['name']),
                'img' => $singleDish['img'],
                'description' => $singleDish['description'],
                'price' => $singleDish['price'],
                'visible' => $singleDish['visible'],
                'restaurant_id' => $singleDish['type']
            ]);
        };
    }
}
