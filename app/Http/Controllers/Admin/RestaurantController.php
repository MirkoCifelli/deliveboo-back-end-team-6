<?php

namespace App\Http\Controllers\Admin;

//support
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Requests
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;

// Helpers
use Illuminate\Support\Str;

// Models
use App\Models\Restaurant;
use App\Models\Typology;

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

        $typologies = Typology::all();
        return view('admin.restaurant.create', compact('typologies'));
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

        $slug = str()->slug($validatedRestaurantData['company_name']);
        $validatedRestaurantData['slug'] = $slug;

        $userId = Auth::user()->id;
        $validatedRestaurantData['user_id'] = $userId;

        $restaurant = Restaurant::create($validatedRestaurantData);
        // dd($validatedRestaurantData);

        if (isset($validatedRestaurantData['typologies'])) {
            foreach ($validatedRestaurantData['typologies'] as $singletypologyId) {
                $restaurant->typologies()->attach($singletypologyId);
            }
        }

        return redirect()->route('admin.dashboard');
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
    public function update(Request $request, string $slug)
    {   
        $user = Auth::user();
        $restaurant = $user->restaurant;

        $restaurantImgPath = $restaurant->img;


        if ($request['img']) {
            if ($restaurantImgPath != null){
                Storage::disk('public')->delete($restaurant->img);
            }
        
            $restaurantImgPath = Storage::disk('public')->put('images', $request['img']);
            
            $imgName = basename($restaurantImgPath);
            
            $restaurant->img = $imgName;
        }
        
        $restaurant->update();


        if (isset($request['typologies'])) {
            $typologies = $request['typologies'];
            $restaurant->typologies()->sync($typologies);
        }

        return redirect()->route('admin.dashboard');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
