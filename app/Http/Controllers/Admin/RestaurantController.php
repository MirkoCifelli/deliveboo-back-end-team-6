<?php

namespace App\Http\Controllers\Admin;

//support
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;

// Models
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //creiamo una variabile user che riconosce se l'utente è autenticato 
        $user=Auth::user();

        //condizione: controlliamo se l'utente è autenticato e in tal caso associamo 
        //ad una variabile restaurant la relazione con uno dei ristoranti richiamando 
        //la funzione presente nel model di user
        if($user){
            $restaurant = $user->restaurant;
            if($restaurant){
                dd($restaurant);

                return view('admin.restaurants.index', compact('restaurant'));
            }else{
                return view('admin.dashboard');  
            }
        }else{
            return redirect()->route('login'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
