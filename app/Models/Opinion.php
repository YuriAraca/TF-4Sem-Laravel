<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $table = 'opiniones';

    protected $fillable = [
        'usuario',
        'opinion',
        'calificacion',
        'id_actividad'
    ];

    protected $hidden = [];

    public $timestamps = true;
}
