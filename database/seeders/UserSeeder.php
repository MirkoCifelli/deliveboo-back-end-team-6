<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;

// Helpers
use Illuminate\Support\Facades\Hash;

// Helpers
use Illuminate\Support\Facades\Schema;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // domain esistenti in italia
        $domain=[
            'gmail.com',
            'gmail.it',
            'hotmail.com',
            'hotmail.it',
            'live.com',
            'aruba.it'
        ];
        // ramdomizer parte iniziale e finale prima e dopo la @ con aggiunta di name(utilizzando faker) e password statica
            for ($i=0; $i < 27 ; $i++) { 
                $randomIndex = random_int(0,5);
                $initDomain = explode('@',fake()->email());
                $endDomain = $domain[$randomIndex];
                $user = User::create([
                    'name' => fake()->firstName(),
                    'email'=> $initDomain[0].'@'.$endDomain,
                    'password'=>'password'
                ]);
            }
    }
}
