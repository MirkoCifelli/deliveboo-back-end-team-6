<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

//Helpers
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

//Models
use App\Models\Order;
use App\Models\Restaurant;

//Mailable
use App\Mail\NewContact;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request){

        $order = Order::create($request->validated());
        $orderDishes = $request->dishes;
        
        $restaurantId = $orderDishes[0]['restaurant_id'];

        $restaurant = Restaurant::find($restaurantId); 

        $user = $restaurant->user;
        $userEmail = $user->email;
        
        
        Mail::to($userEmail)->send(new NewContact($order, $orderDishes));        

        foreach ($orderDishes as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        }
        
        return response()->json([
            'success' => true,
            'message'=> 'Ordine effettuato con successo',
        ]);
    }
}
