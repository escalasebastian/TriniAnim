<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoN extends Model
{
    use HasFactory;
    protected $fillable=[
        'actividad',
        'emocion_nombre',
        'fecha',
        'hora'
    ];
}
