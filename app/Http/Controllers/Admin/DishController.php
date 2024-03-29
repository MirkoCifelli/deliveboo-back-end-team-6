<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Support
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// Helpers
use Illuminate\Support\Str;
// Models
use App\Models\Dish;

// Requests
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $restaurant = $user->restaurant;
        $dishes = $restaurant->dishes;
        // $dishes = $user->restaurant->dishes; DA PROVARE 

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $validatedDishData = $request->validated();

        $dishImgPath = null;

        if (isset($validatedDishData['img'])) {
            $dishImgPath = Storage::disk('public')->put('images', $validatedDishData['img']);
        }
        //immagine di defaut nulla e apriamo una condizione:"se nelle nostre validation c'è l'immagine,
        //allora salviamo il percorso:disco publico e put(mettila nella cartella images)"

        $validatedDishData['img'] = $dishImgPath;

        $slug = Str::slug($validatedDishData['name']);

        $user = Auth::user();

        $restaurant = $user->restaurant;

        $validatedDishData['restaurant_id'] = $restaurant->id;



        $dish = Dish::create([
            'name' => $validatedDishData['name'],
            'slug' => $slug,
            'description' => $validatedDishData['description'],
            'price' => $validatedDishData['price'],
            'visible' => $validatedDishData['visible'],
            'restaurant_id' => $validatedDishData['restaurant_id'],
            'img' => $dishImgPath,
        ]);

        return redirect()->route('admin.dishes.show', ['dish' => $dish->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $dish = Dish::where('slug', $slug)->firstOfFail();
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, string $slug)
    {
        $validatedDishData = $request->validated();
        $dish = Dish::where('slug', $slug)->firstOfFail();

        $dishImgPath = $dish->img;

        if (isset($validatedDishData['img'])) {
            if ($dishImgPath != null) {
                Storage::disk('public')->delete($dish->img);
            }

            $dishImgPath = Storage::disk('public')->put('images', $validatedDishData['img']);
        } else if (isset($validatedDishData['delete_img'])) {
            Storage::disk('public')->delete($dish->img);

            $dishImgPath = null;
        }

        $validatedDishData['img'] = $dishImgPath;

        $slug = str()->slug($validatedDishData['name']);
        $validatedDishData['slug'] = $slug;

        $dish->update($validatedDishData);


        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
