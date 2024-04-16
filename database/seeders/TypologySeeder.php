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

        $allTypologies = config('typologies.allTypologies');
        $allTypologiesImg = config('typologies.allTypologiesImg');
        
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
