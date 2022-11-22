<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\PrecioHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se utilizara para realizar labusqueda segun los parametros que se proporiconaron

        $valid = Validator::make($request->all(), [
            'inicio' => 'required|date',
            'fin' => 'required|date',
            'personas' => 'required|integer',
        ]);

        if ($valid->fails()) {
            $errors = $valid->errors();
            return redirect()->back()->withErrors($errors);
        }

        $personas = $request->input('personas');
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');

        $habitaciones_bloqueadas = DB::table('reservacions')
                                    ->whereBetween('inicio', [$request->input('inicio'), $request->input('fin')])
                                    ->pluck('id')
                                    ->toArray();

        $disponibilidad = DB::table('rooms')
                                    ->where('rooms.capacidad', '>=', $personas)
                                    ->whereNotIn('rooms.id', $habitaciones_bloqueadas)
                                    ->join('precio_habitacions', 'precio_habitacions.tipo', '=', 'rooms.tipo')
                                    ->select('rooms.id AS id','rooms.numero AS numero', 'rooms.tipo AS tipo', 'rooms.capacidad AS capacidad', 'precio_habitacions.precio AS precio')
                                    ->get();

        return view('booking.search_result', compact('disponibilidad', 'personas', 'inicio', 'fin'));
        //return $disponibilidad;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $inicio = $request->input('inicio');
        $fin = $request->input('fin');
        $personas = $request->input('personas');
        $capacidad = $request->input('capacidad');
        $precio = $request->input('precio');
        $numero_habitacion = $request->input('habitacion');

        $toDate = Carbon::parse($inicio);
        $fromDate = Carbon::parse($fin);
  
        $days = $toDate->diffInDays($fromDate);
        $total = $days * $precio;        


        return view('booking.checkout', compact('inicio', 'fin', 'personas', 'capacidad', 'precio', 'numero_habitacion', 'total'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
