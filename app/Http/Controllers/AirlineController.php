<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;

class AirlineController extends Controller
{
    //CRUD for displaying Airlines
    public function index()
    {
        return view('airlines.index', [
            'airlines' => Airline::all(),
        ]);
    }

    public function show($slug){
        return view('airlines.show', [
            'airline' => Airline::where('slug', $slug)->firstOrFail(),
        ]);
    }
    
}
