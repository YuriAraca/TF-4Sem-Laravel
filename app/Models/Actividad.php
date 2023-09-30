<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'actividad',
        'descripcion',
        'precio',
        'duracion',
        'id_lugar_turistico'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
