<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class LandingController extends Controller
{
    /**
     * Muestra la landing page con el listado de eventos publicados.
     * Solo eventos con estado 'published' son visibles al público.
     */
    public function index()
    {
        $categorias = Evento::where('estado', 'published')
            ->distinct()
            ->pluck('categoria');

        return view('landing', compact('categorias'));
    }
}