<?php

namespace App\Http\Controllers\Admin;

//support
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
                // dd($restaurant);

                return view('admin.restaurant.index', compact('restaurant'));
            }else{
                return view('admin.dashboard');  
            }
        }else{
            return redirect()->route('login'); 
        }
    }

        /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        return view('admin.restaurant.show', compact('restaurant'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validatedRestaurantData = $request->validated();

        $ImgPath = null;

        if (isset($validatedRestaurantData['img'])) {
            $ImgPath = Storage::disk('public')->put('images', $validatedRestaurantData['img']);
        }
        //immagine di defaut nulla e apriamo uan condizione:"se nelle nostra validation c'è l'immagina allora salviamo il percorso:disco publico e put(mettila nella cartella images)"


        $validatedRestaurantData['img'] = $ImgPath;
        $restaurant = Restaurant::create($validatedRestaurantData);
        // dd($validatedRestaurantData);

        return redirect()->route('admin.restaurant.show', ['restaurant' => $restaurant->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        return view('admin.restaurant.edit',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, string $slug)
    {
        // $validatedRestaurantData = $request->validated();
        // $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        // $ImgPath = $restaurant->img;

        // if (isset($validatedRestaurantData['img'])) {
        //     if($ImgPath != null){
        //         Storage::disk('public')->delete($restaurant->img);
        //     }

        //     $ImgPath = Storage::disk('public')->put('images', $validatedRestaurantData['img']);

        //     }else if (isset($validatedRestaurantData['delete_img'])) {
        //         Storage::disk('public')->delete($restaurant->img);

        //         $ImgPath = null;
        // }


        // $validatedRestaurantData['img'] = $ImgPath;
        // $validatedRestaurantData['slug'] = $slug = str()->slug($validatedRestaurantData['company_name']);
        // $restaurant->update($validatedRestaurantData);
        // // dd($validationResult);


        // return redirect()->route('admin.restaurant.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
