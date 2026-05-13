<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\Widget;

class ActividadReciente extends Widget
{
    protected static ?string $heading = 'Actividad reciente';
    protected string $view = 'filament.widgets.actividad-reciente';
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = [
        'sm'  => 1,
        'md'  => 1,
        'xl'  => 1,
        '2xl' => 1,
    ];

    public function getPedidos()
    {
        return Pedido::with('usuario')
            ->latest()
            ->take(6)
            ->get();
    }
}