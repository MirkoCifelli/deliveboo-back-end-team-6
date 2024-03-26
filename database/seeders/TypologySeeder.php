<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Typology;

// Helpers
use Illuminate\Support\Facades\Schema;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Typology::truncate();
        });

        // Istanziono array con valori per Typology con un immagine

        $allTypologies = [
            'Italiano',
            'Americano',
            'Messicano',
            'Giapponese',
            'Cinese',
            'Indiano',
            'Vegetariano',
            'Pesce',
            'Thailandese',
            'Coreano',
            'Spagnolo',
            'Greco'
        ];
        $allTypologiesImg = [
            'Italiano.jpg',
            'Americano.jpg',
            'Messicano.jpg',
            'Giapponese.jpg',
            'Cinese.jpg',
            'Indiano.jpg',
            'Vegetariano.jpg',
            'Pesce.jpg',
            'Thailandese.jpg',
            'Coreano.jpg',
            'Spagnolo.jpg',
            'Greco.jpg'
        ];
        
        //Faccimao un ciclo con indice e definiamo le chiavi con i relativi dati
       
        foreach ($allTypologies as $key => $singleTypology) {

            $typology = Typology::create([
                'name' => $singleTypology,
                'slug' => str()->slug($singleTypology),
                'img'=> $allTypologiesImg[$key]
            ]);
        }
    }
}
