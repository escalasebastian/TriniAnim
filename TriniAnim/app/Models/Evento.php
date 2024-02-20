<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable=[
        'usuario_id',
        'actividad_id',
        'emocion_id', 
        'descripcion'
    ];

}
