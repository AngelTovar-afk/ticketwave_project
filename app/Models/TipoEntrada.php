<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntrada extends Model
{
    use HasFactory;

    protected $table = 'tipos_entrada';

    protected $fillable = [
        'evento_id', 'nombre', 'descripcion',
        'disponibles', 'precio', 'limite_por_compra',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function itemsPedido()
    {
        return $this->hasMany(ItemPedido::class);
    }
}