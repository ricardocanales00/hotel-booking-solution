<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TunelController extends Controller
{
    public function controllerMethod(Request $request) {
       $inicio = $request->inicio;
       $fin = $request->fin;
       $personas = $request->personas;
       return view('tunel', compact('inicio','fin','personas'));
    }
}
