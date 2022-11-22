<?php

namespace App\Http\Controllers;

use Auth;
use Alert;

use Session;

use App\Models\PrecioHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrecioHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = PrecioHabitacion::all();
        if(Auth::user()->isAbleTo('ver-precios') == true){
            return view('app.roomsprice.index', compact('precios'));
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAbleTo('crear-precios') == true){
            return view('app.roomsprice.create');
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'precio' => 'required',
            'fecha-inicio' => 'required|date',
            'fecha-fin' => 'required|date',
            'tipo' => 'required|string'
        ]);

        if ($valid->fails()) {
            $errors = $valid->errors();
            return redirect()->back()->withErrors($errors);
        }

        if(Auth::user()->isAbleTo('crear-precios') == true){
            //creating the message
            $habitacion = new PrecioHabitacion;
            $habitacion->tipo = $request->input('tipo');
            $habitacion->inicio = $request->input('fecha-inicio');
            $habitacion->fin = $request->input('fecha-fin');
            $habitacion->precio = $request->input('precio');

            //save message
            $habitacion->save();

            Alert::success('Precio Guardado', 'Se ha guardado el precio con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrecioHabitacion  $precioHabitacion
     * @return \Illuminate\Http\Response
     */
    public function show(PrecioHabitacion $precioHabitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrecioHabitacion  $precioHabitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(PrecioHabitacion $precioHabitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrecioHabitacion  $precioHabitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrecioHabitacion $precioHabitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrecioHabitacion  $precioHabitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->isAbleTo('eliminar-precios') == true){
            PrecioHabitacion::find($id)->delete();
            Alert::success('Precio eliminado','Se ha eliminado el precio con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }
}
