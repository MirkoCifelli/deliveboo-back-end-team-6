<?php

namespace App\Http\Controllers\Api;

// Models
use App\Models\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request){

        /*
            Intercetto i paramentri passati dal front-end,
            per poi racchiuderli in due variabili
        */
        $slug = $request->input('slug');
        $typologies = $request->input('typologies');

        /*
            Per prima cosa creo una nuova instanza dell'oggetto Restaurant, 
            portando con sè le sue relazioni con i dishes e le typologies.
        */
        $restaurants = Restaurant::with('dishes', 'typologies');

        /*
            Tramite delle condizioni, costruisco l'instanza dell'oggetto,
            e quindi la query, controllando se i parametri passati dal front-end sono impostati.
            
            In quel caso richiamo solamente i ristoranti che rispondono a quei parametri
        */
        if(isset($slug)){
            $restaurants->where('slug', 'like', "%$slug%");
        }

        if(isset($typologies)){
            $restaurants->whereHas('typologies', function ($query) use ($typologies) {
                $query->whereIn('name', $typologies);
            });
        }

        /*
            Creo la query, impaginando con sei risultati per pagina
        */
        $results = $restaurants->paginate(6)->get();


        
        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }

    public function show(string $slug){
        $restaurant = Restaurant::with('dishes', 'typologies')->where('slug', $slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}
