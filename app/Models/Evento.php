<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'usuario_id',
        'recinto_id',
        'nombre',
        'descripcion',
        'categoria',
        'imagen_url',
        'estado',
        'fecha_evento',
    ];
}