<?php

namespace App\Http\Controllers;

use App\Models\Lugar_turistico;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {

        return view('home', [
            'lugar' => Lugar_turistico::all()
        ]);
    }
}
