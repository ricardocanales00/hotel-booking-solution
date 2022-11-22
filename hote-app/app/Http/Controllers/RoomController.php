<?php

namespace App\Http\Controllers;

use Auth;
use Alert;

use Session;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        if(Auth::user()->isAbleTo('ver-habitaciones') == true){
            return view('app.rooms.index', compact('rooms'));
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
        if(Auth::user()->isAbleTo('crear-habitaciones') == true){
            return view('app.rooms.create');
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
            'numero' => 'required|string|unique:rooms',
            'tipo' => 'required|string',
            'capacidad' => 'required|integer'
        ]);

        if ($valid->fails()) {
            $errors = $valid->errors();
            return redirect()->back()->withErrors($errors);
        }

        if(Auth::user()->isAbleTo('crear-habitaciones') == true){
            //creating the message
            $habitacion = new Room;
            $habitacion->numero = $request->input('numero');
            $habitacion->tipo = $request->input('tipo');
            $habitacion->capacidad = $request->input('capacidad');

            //save message
            $habitacion->save();

            Alert::success('Habitacion Guardada', 'Se ha guardado la habitacion con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = "";
        if(Auth::user()->isAbleTo('actualizar-habitaciones') == true){
            $room = Room::where('rooms.id','=', $id)->first();
            return view('app.rooms.update', compact('room'));
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'numero'=>$request->numero,
            'tipo'=>$request->tipo,
            'capacidad'=>$request->capacidad
        );

        if(Auth::user()->isAbleTo('actualizar-habitaciones') == true){

            Room::whereId($id)->update($form_data);

            Alert::success('Habitacion actualizada', 'Se ha actualizado la habitacion con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Auth::user()->isAbleTo('eliminar-habitaciones') == true){
            Room::find($id)->delete();
            Alert::success('Habitacion eliminada','Se ha eliminado la habitacion con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para visualizar este modulo']);
        }
    }
}
