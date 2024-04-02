<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Order;

// Helpers
use Illuminate\Support\Facades\Schema;
use DateTime;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Order::truncate();
        });

        $restaurantId = null;
        
        $domain=[
            'gmail.com',
            'gmail.it',
            'hotmail.com',
            'hotmail.it',
            'live.com',
            'aruba.it'
        ];

        $years = [
            '2020',
            '2021',
            '2022',
            '2023',
        ];

        for ($i=0; $i < 10; $i++) { 

            // Per random email
            $randomIndexEmail = random_int(0,5);
            $initDomain = explode('@',fake()->email());
            $endDomain = $domain[$randomIndexEmail];

            // Per creare annata che vogliamo
            $date = fake()->dateTime();
            $randomIndexDate = random_int(0,3);
            $newDate = DateTime::createFromFormat('Y-m-d H:i:s', $years[$randomIndexDate] . $date->format('-m-d H:i:s'));

            $order = Order::create([
                'customer_name' => fake()->firstName(),
                'customer_lastname' => fake()->lastName(),
                'customer_address' => fake()->address(),
                'customer_phone' => fake()->phoneNumber(),
                'customer_email' => $initDomain[0].'@'.$endDomain,
                'customer_total_price' => fake()->randomFloat(2, 0, 1000),
                'created_at' => $newDate,
            ]);
        }

    }
}
