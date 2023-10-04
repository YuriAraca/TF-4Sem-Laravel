<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LugarController extends Controller
{
    public function show($lugar){
        $lugarDetalles = DB::selectOne('select 
            r.nombre region,
            c.nombre ciudad,
            l.nombre lugar,
            l.descripcion descripcion,
            l.precio_entrada inPrice,
            l.hora_entrada inTime,
            l.hora_salida outTime,
            l.ruta_imagen rutaImagen,
            a.actividad actividad,
            a.descripcion descripcionActividad,
            a.precio precioActividad,
            a.duracion duracionActividad
            from regiones r
            join ciudades c on c.id_region = r.id
            join lugares_turisticos l on l.id_ciudad = c.id
            left join actividades a on a.id_lugar_turistico = l.id
            where l.nombre = ? ', [$lugar]);
        

    if (!$lugarDetalles) {
        return redirect('/')->with('error', 'Hubo un error para abrir, intentalo mas tarde');
    }

    return view('lugar', ['lugar' => $lugarDetalles]);
    }
}
