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

        $domain = [
            'gmail.com',
            'gmail.it',
            'hotmail.com',
            'hotmail.it',
            'live.com',
            'aruba.it'
        ];

        for ($i = 0; $i < 10; $i++) {

            $randomIndexEmail = random_int(0, 5);
            $initDomain = explode('@', fake()->email());
            $endDomain = $domain[$randomIndexEmail];


            $order = Order::create([
                'customer_name' => fake()->firstName(),
                'customer_lastname' => fake()->lastName(),
                'customer_address' => fake()->address(),
                'customer_phone' => fake()->phoneNumber(),
                'customer_email' => $initDomain[0] . '@' . $endDomain,
                'customer_total_price' => 0,
                'created_at' => fake()->dateTimeBetween('-4 year', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
