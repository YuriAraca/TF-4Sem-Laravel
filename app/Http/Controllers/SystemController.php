<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Ciudad;
use App\Models\Lugar_turistico;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Region;
use Illuminate\Notifications\Action;

use function Laravel\Prompts\error;

class SystemController extends Controller
{
    public function show()
    {
        return view('system');
    }

    public function addContent(Request $request)
    {

        $region = $request->input('region');
        $ciudad = $request->input('ciudad');
        $lugarTuristico = $request->input('lugarTuristico');
        $descripcion = $request->input('descripcion');
        $inPrice = $request->input('inPrice');
        $inTime = $request->input('inTime');
        $outTime = $request->input('outTime');
        $imagen = $request->input('imagen');        

        try {
            DB::transaction(function () use($request){
        
                $region = Region::create([
                    'nombre' => $request->input('region'),
                ]);
        
                $ciudad = Ciudad::create([
                    'nombre' => $request->input('ciudad'),
                    'id_region' => $region->id,
                ]);
        
                $lugar_turistico = Lugar_turistico::create([ 
                    'nombre' => $request->input('lugarTuristico'),
                    'descripcion' => $request->input('descripcion'),
                    'precio_entrada' => $request->input('inPrice'),
                    'hora_entrada' => $request->input('inTime'),
                    'hora_salida' => $request->input('outTime'),
                    'id_ciudad' => $ciudad->id,
                    
                ]);
        
                $actividad = Actividad::create([  
                    'actividad' => 'valor4',
                    'descripcion' => 'Descripción de la actividad',
                    'precio' => 50.00,
                    'duracion' => '01:00:00',
                    'id_lugar_turistico' => $lugar_turistico->id,
                ]);
            });
        
            return redirect('/system')->with('success', 'Se registro correctamente');
        
        } catch (\Exception $e) {

            return redirect('/system')->with('error', 'Hubo un error al guardar los datos'.$e);
        }
    }
}
