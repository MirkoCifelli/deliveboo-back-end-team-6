<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Restaurant;
use App\Models\Typology;


class RestaurantTipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $tipologies = Typology::inRandomOrder()->get();
            
            $counter = 0;
            $maxTipologies = rand(1, 2);
            foreach ($tipologies as $typology) {
                if ($counter < $maxTipologies) {
                    $restaurant->typologies()->attach($typology->id);
                    $counter++;
                }
                else {
                    break;
                }
            }
        }

    }
}
