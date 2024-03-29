<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Typology;

class TypologyController extends Controller
{
    public function index(){
        $typologies = Typology::all();
        return response()->json([
            'success' => true,
            'results' => $typologies
        ]);
    }
}
