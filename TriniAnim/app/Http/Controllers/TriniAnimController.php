<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Emocion;
use App\Models\Evento;
use App\Models\EventoN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TriniAnimController extends Controller
{

    public function prueba()
    {
        $usuario_id = Auth::user()->id;
        $eventos = Evento::where('usuario_id', $usuario_id)->get();
        $arrayEventos = array();
        foreach ($eventos as $eventoViejo) {
            $eventoNuevo = new EventoN();
            // Creación actividad
            $actividad = Actividad::find($eventoViejo->actividad_id);
            $eventoNuevo->actividad = $actividad->nombre;
            // Creación emoción
            $emocion = Emocion::find($eventoViejo->emocion_id);          
            $eventoNuevo->emocion = $emocion->emocion;
            // Fecha y hora
            if(isset($eventoViejo->created_at)){ // Si es que tiene created_at
                $splitCreated_at=explode(" ", $eventoViejo->created_at);
                $fecha=$splitCreated_at[0];
                $horaCompleta=$splitCreated_at[1];
                // split de la fecha
                $splitFecha=explode("-", $fecha);
                $dia=$splitFecha[2];
                $mes=$splitFecha[1];
                $anio=$splitFecha[0];
                // Split de la hora
                $splitHoraCompleta=explode(":", $horaCompleta);
                $hora=$splitHoraCompleta[0];
                $minutos=$splitHoraCompleta[1];
                // Añadir al evento
                $eventoNuevo->fecha = "dia: ".$dia;
                $eventoNuevo->hora = "hora: ".$hora."h";
            }
            // add array
            array_push($arrayEventos, $eventoNuevo);
        }
        
        return view('trini.resumen-diario', [
            'eventos' => $arrayEventos
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dashboard?
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evento = new Evento();
        $listaAct = DB::select('select distinct * from actividads');
        //return $listaAct;
        $listaEm = DB::select('select distinct * from emocions');
        return view('trini.save', [
            'evento' => $evento,
            'actividades' => $listaAct,
            'emociones' => $listaEm
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->usuario_id = Auth::user()->id;
        $evento->actividad_id = $request->act;
        $evento->emocion_id = $request->em;
        $evento->descripcion = $request->descripcion;

        // Se guarda en la db
        $evento->save();
        // En el redirect va la url
        return Redirect::to('/prueba')->with('notificacion', 'Se creó el evento correctamente');
        //return "ha llegado: " . $evento;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

