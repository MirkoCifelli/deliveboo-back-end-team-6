<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Restaurant;
use App\Models\User;

// Helpers
use Illuminate\Support\Facades\Schema;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Restaurant::truncate();
        });

        $allRestaurants = [
            "Pasta La Vista",
            "Yankee Doodle Diner",
            "Nacho Nirvana",
            "Sushi-liscious",
            "Wok 'n Rollin'",
            "Curry Comedy Corner",
            "Veggie Voyage",
            "Fish 'n Furious",
            "Pad Thai Party Palace",
            "Kimchi Carnival Kitchen",
            "Olè! Omelette",
            "Mythos Tavern"
        ];


        foreach ($allRestaurants as $key => $singleRestaurant) {

            $randomUser = User::inRandomOrder()->first();

            $restaurant = Restaurant::create([
                'company_name' => $singleRestaurant,
                'slug' => str()->slug($singleRestaurant),
                'address' => fake()->address(),
                'vat_number' => fake()->vat(),
                //'img' => ,
                'visible' => fake()->boolean(),
                'user_id' => $randomUser->id
            ]);
            
        }

    }
}
