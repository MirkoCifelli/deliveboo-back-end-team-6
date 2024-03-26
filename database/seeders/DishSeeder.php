<?php

namespace Database\Seeders;

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
        $dishes = [
            [
                'name' => 'Spaghetti al pomodoro',
                'slug' => 'spaghetti-al-pomodoro',
                'img' => 'Italiano.jpg',
                'description' => 'Classico piatto italiano con spaghetti e sugo di pomodoro',
                'price' => 15.20,
                'visible' => true,
            ],
            [
                'name' => 'Sushi',
                'slug' => 'sushi',
                'img' => 'Giapponese.jpg',
                'description' => 'Classico piatto Giapponese con riso e pesce',
                'price' => 20.00,
                'visible' => true,
            ]

        ];

        foreach ($dishes as $dish) {
            $new_dish = new Dish();

            $new_dish->name = $dish['name'];
            $new_dish->slug = Str::slug($dish['slug'], '-');
            $new_dish->img = $dish['img'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->visible = $dish['visible'];
        };
    }
}
