<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function dashboard()
    {
        /*
            controlliamo se l'utente è autenticato 
            se si return --> dashboard
            se così non fosse facciamo un redirect alla route log in
        */

        $user = Auth::user();
        $restaurant = $user->restaurant;

        if($user){

            /*
                se l'utente autenticato ha un ristorante, viene indirizzato sulla Dashboard,
                altrimenti viene indirizzato sulla pagina di creazione del ristorante.
            */

            if($restaurant){

                return view('admin.dashboard');
            }else{

                return view('admin.restaurant.create');
            }

        }else{
            return redirect()->route('login'); 
        }

    }

}
