<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;

    protected $table = 'items_pedido';

    protected $fillable = [
        'pedido_id',
        'tipo_entrada_id',
        'cantidad',
        'precio_unitario',
    ];
}