<?php

namespace App\Http\Controllers;

use Auth;
use Alert;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->hasRole('administrator')){
                $reservas = Reservacion::join('rooms', 'rooms.id', '=', 'reservacions.habitacion')
                            ->select('reservacions.id AS id','reservacions.inicio AS inicio','reservacions.fin AS fin','reservacions.precio AS precio','reservacions.personas AS personas','reservacions.estatus AS estatus','reservacions.nombre AS nombre','reservacions.apellidos AS apellidos','rooms.numero AS numero')
                            ->get();
                return view('booking.index', compact('reservas'));
            } else {
                $myReservations = Reservacion::where('correo', '=', Auth::user()->email)->get();
                return view('booking.myreservations', compact('myReservations'));
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'inicio' => 'required|date',
            'fin' => 'required|date',
            'precio' => 'required',
            'personas' => 'required|integer',
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required',
            'celular' => 'required',
            'fecha-de-nacimiento' => 'required|date',
            'nacionalidad' => 'required',
        ]);

        if ($valid->fails()) {
            $errors = $valid->errors();
            return redirect()->back()->withErrors($errors);
        }

            //creating the message
            $reservacion = new Reservacion;
            $reservacion->inicio = $request->input('inicio');
            $reservacion->fin = $request->input('fin');
            $reservacion->precio = $request->input('precio');
            $reservacion->personas = $request->input('personas');
            $reservacion->estatus = "1";
            $reservacion->nombre = $request->input('nombre');
            $reservacion->apellidos = $request->input('apellidos');
            $reservacion->correo = $request->input('correo');
            $reservacion->celular = $request->input('celular');
            $reservacion->nacionalidad = $request->input('nacionalidad');
            $reservacion->nacimiento = $request->input('fecha-de-nacimiento');
            $reservacion->habitacion = $request->input('habitacion');

            //save message
            $reservacion->save();

            Alert::success('Reserva confirmadada', 'Se ha confirmado tu reserva');
            return redirect()->route('es');
    } 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function show(Reservacion $reservacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reservacion::where('id','=', $id)->first();
        if(Auth::user()->email == $reserva->correo){
            return view('booking.edit', compact('reserva'));
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para modificar esta reserva']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buscador = rand(1, 2);
        $reserva = Reservacion::where('id','=', $id)->first();
        if($request->personas !=  $reserva->personas && $request->personas > 3){
            Alert::error('No se puede actualizar', 'Debido al aumento de personas, deberas realizar una nueva reserva');
            return redirect(url()->previous() . "");
        }

        if($buscador == 2){
            return back()->withErrors(['error' => 'No hay disponibilidad para los dias solicitados']);
        } else {
            $form_data = array(
                'inicio'=>$request->inicio,
                'fin'=>$request->fin,
                'personas'=>$request->personas
            );

            Reservacion::whereId($id)->update($form_data);

            Alert::success('Reserva actualizada', 'Se ha actualizado la reserva con éxito');
            return redirect(url()->previous() . "");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validacion = Reservacion::where('id', '=', $id)->first();
        if(Auth::user()->email == $validacion->correo){
            Reservacion::find($id)->delete();
            Alert::success('Reserva cancelada','Se ha cancelado la reserva con éxito');
            return redirect(url()->previous() . "");
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permiso para cancelar esta reserva']);
        }
    }
}
