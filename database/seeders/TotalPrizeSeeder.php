<?php

namespace Database\Seeders;

// Models
use App\Models\Order;
use App\Models\Dish;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TotalPrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $totalPrice = 0;

            // Itera sui piatti dell'ordine e calcola il prezzo totale considerando la quantità di ogni piatto
            foreach ($order->dishes as $dish) {
                $totalPrice += $dish->price * $dish->pivot->quantity;
            }

            // Assegna il prezzo totale all'ordine
            $order->customer_total_price = $totalPrice;
            $order->save();
        }

    }
}
