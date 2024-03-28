<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function dashboard()
    {
        //controlliamo se l'utente è autenticato 
        //se si return --> dashboard
        //se così non fosse facciamo un redirect alla route log in
        $user=Auth::user();

        if($user){
            return view('admin.dashboard');
        }else{
            return redirect()->route('login'); 
        }

    }

}
