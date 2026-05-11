<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntrada extends Model
{
    use HasFactory;

    protected $table = 'tipos_entrada';

    protected $fillable = [
        'evento_id',
        'nombre',
        'descripcion',
        'disponibles',
        'precio',
        'limite_por_compra',
    ];
}