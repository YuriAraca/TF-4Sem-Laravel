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
        try {
            DB::transaction(function () use($request){

                if ($request->hasFile('imagen')) {
                    $imagen = $request->file('imagen');
                    $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
                    $imagen->move(public_path('images'), $nombreImagen);
                } else {
                    return redirect('/')->with('error', 'No se cargo la imagen.');
                }
                
                $region = Region::firstOrCreate([
                    'nombre' => $request->input('region')
                ]);

                $ciudad = Ciudad::firstOrCreate([
                    'nombre' => $request->input('ciudad'),
                    'id_region' => $region->id,
                ]);

                $lugar_turistico = Lugar_turistico::create([
                    'nombre' => $request->input('lugarTuristico'),
                    'descripcion' => $request->input('descripcion'),
                    'precio_entrada' => $request->input('inPrice'),
                    'hora_entrada' => $request->input('inTime'),
                    'hora_salida' => $request->input('outTime'),
                    'ruta_imagen' => $nombreImagen,
                    'id_ciudad' => $ciudad->id,

                ]);
                

                if($request->input('actividad')){
                    $actividad = Actividad::create([  
                        'actividad' => $request->input('actividad'),
                        'descripcion' => $request->input('descripcionActividad'),
                        'precio' => $request->input('priceActividad'),
                        'duracion' => $request->input('duracionActividad'),
                        'id_lugar_turistico' => $lugar_turistico->id,
                    ]);
                }
                    
            });
        
            return redirect('/system')->with('success', 'Se registro correctamente');
        
        } catch (\Exception $e) {

            return redirect('/system')->with('error', 'Hubo un error al registrar los datos'.$e);
        }
    }
}
