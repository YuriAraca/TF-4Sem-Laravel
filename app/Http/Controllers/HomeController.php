<?php

namespace App\Http\Controllers;

use App\Models\Lugar_turistico;
use Exception;
use Illuminate\Cache\LuaScripts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Actividad;

class HomeController extends Controller
{
    public function show()
    {
        return $this->data();
    }
    
    public function buscar(Request $request)
    {
        return $this->data($request->input('buscar'));
    }
    
    private function data($buscar = null)
    {
        $lugares = Lugar_turistico::join('ciudades', 'ciudades.id', '=', 'lugares_turisticos.id_ciudad')
                                  ->join('regiones', 'regiones.id', '=', 'ciudades.id_region')
                                  ->select('lugares_turisticos.id as lugarId', 'regiones.nombre as region', 'ciudades.nombre as ciudad', 'lugares_turisticos.nombre as lugar', 'lugares_turisticos.ruta_imagen as url');
        
        if ($buscar) {
            $lugares->where('regiones.nombre', 'LIKE', '%' . $buscar . '%')
                    ->orWhere('ciudades.nombre', 'LIKE', '%' . $buscar . '%')
                    ->orWhere('lugares_turisticos.nombre', 'LIKE', '%' . $buscar . '%');
        }
    
        return view('home', ['lugares' => $lugares->get()]);
    }


    public function borrar(Request $request)
    {
        $lugarId = $request->input('lugarId');
        try{
            $ruta_imagen = DB::selectOne('select l.ruta_imagen from lugares_turisticos l where id = ?', [$lugarId]);
            if (file_exists('images/'.$ruta_imagen->ruta_imagen)) {
                unlink('images/'.$ruta_imagen->ruta_imagen);
            }
            DB::table('lugares_turisticos')->where('id', $lugarId)->delete();
            return back()->with('success', 'Lugar turistico borrado');
        }catch(\Exception $e){
            return back()->with('error', 'Error al borrar: '.$e->getMessage());
        }
        
    }

    public function showActividades()
    {
        $actividades = DB::select('select 
            a.id id,
            a.actividad actividad,
            a.descripcion descripcion,
            a.precio precio,
            a.duracion duracion,
            l.nombre lugar
            from actividades a
        join lugares_turisticos l on l.id = a.id_lugar_turistico');
        return view('actividades', compact('actividades'));
    }

    public function borrarActividad(Request $request)
    {
        $actividadId = $request->input('actividadId');
        try{
            DB::table('actividades')->where('id', $actividadId)->delete();
            return back()->with('success', 'Actividad borrada');
        }catch(\Exception $e){
            return back()->with('error', 'Error al borrar: '.$e->getMessage());
        }
        
    }


    public function showRegiones()
    {
        $results = DB::select('select 
                    r.id region_id,
                    r.nombre region,
                    c.id ciudad_id,
                    c.nombre ciudad,
                    l.nombre lugar
                from regiones r
                join ciudades c on c.id_region = r.id
                join lugares_turisticos l on l.id_ciudad = c.id');

        $regiones = [];
        foreach ($results as $result) {
            if (!isset($regiones[$result->region_id])) {
                $regiones[$result->region_id] = [
                    'nombre' => $result->region,
                    'ciudades' => []
                ];
            }
            
            if (!isset($regiones[$result->region_id]['ciudades'][$result->ciudad_id])) {
                $regiones[$result->region_id]['ciudades'][$result->ciudad_id] = [
                    'nombre' => $result->ciudad,
                    'lugares' => []
                ];
            }

            $regiones[$result->region_id]['ciudades'][$result->ciudad_id]['lugares'][] = $result->lugar;
        }

        return view('regiones', compact('regiones'));
    }
}
