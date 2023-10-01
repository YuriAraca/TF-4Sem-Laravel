<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar_turistico extends Model
{
    use HasFactory;

    protected $table = 'lugares_turisticos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_entrada',
        'hora_entrada',
        'hora_salida',
        'imagen',
        'id_ciudad'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
