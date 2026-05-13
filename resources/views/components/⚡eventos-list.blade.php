<?php

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    /** @var string Texto del buscador, wire:model lo sincroniza automáticamente */
    public string $busqueda = '';

    /** @var string Categoría seleccionada para filtrar */
    public string $categoria = '';

    /**
     * Resetea la paginación cuando el usuario escribe en el buscador.
     * Sin esto, al buscar podría quedarse en una página que ya no existe.
     */
    public function updatedBusqueda(): void
    {
        $this->resetPage();
    }

    /**
     * Resetea la paginación cuando cambia la categoría.
     */
    public function updatedCategoria(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $eventos = Evento::where('estado', 'published')
            ->when($this->busqueda, fn($q) =>
                $q->where('nombre', 'like', "%{$this->busqueda}%"))
            ->when($this->categoria, fn($q) =>
                $q->where('categoria', $this->categoria))
            ->orderBy('fecha_evento')
            ->paginate(10);

        $categorias = Evento::where('estado', 'published')
            ->distinct()
            ->pluck('categoria');

        return view('livewire.eventos-list', compact('eventos', 'categorias'));
    }
};
?>

<div>
    {{-- Buscador y filtro por categoría en tiempo real --}}
    <div class="flex flex-col md:flex-row gap-4 mb-8">
        <input
            wire:model.live="busqueda"
            type="text"
            placeholder="Buscar artistas, eventos o lugares..."
            class="w-full md:w-2/3 px-5 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:border-white/50"
        />

        <select
            wire:model.live="categoria"
            class="w-full md:w-1/3 px-5 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:border-white/50">
            <option value="">Todas las categorías</option>
            @foreach ($categorias as $cat)
                <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>

    {{-- Grid de eventos --}}
    @if ($eventos->isEmpty())
        <div class="text-center py-24">
            <p class="text-xl text-white/60 font-light">No se encontraron eventos.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($eventos as $evento)
                @php
                    $precioDesde = $evento->tiposEntrada->min('precio');
                    $agotado = $evento->tiposEntrada->sum('disponibles') === 0;
                @endphp

                <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:border-white/30 transition">
                    <div class="relative">
                        <img
                            src="{{ $evento->imagen_url ?? 'https://via.placeholder.com/400x200' }}"
                            alt="{{ $evento->nombre }}"
                            class="w-full h-48 object-cover"
                        />
                        @if ($agotado)
                            <span class="absolute top-3 right-3 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Agotado
                            </span>
                        @endif
                    </div>

                    <div class="p-5">
                        <p class="text-white font-semibold text-lg leading-tight">{{ $evento->nombre }}</p>
                        <p class="text-white/50 text-sm mt-1">{{ $evento->fecha_evento->format('d/m/Y H:i') }}</p>
                        <p class="text-white/50 text-sm">{{ $evento->recinto->nombre ?? 'Recinto no disponible' }}</p>

                        <div class="flex items-center justify-between mt-4">
                            @if ($precioDesde)
                                <span class="text-green-400 font-semibold">Desde ${{ number_format($precioDesde, 2) }}</span>
                            @else
                                <span class="text-white/40 text-sm">Sin precio</span>
                            @endif

                            @if (!$agotado)
                                <a href="/eventos/{{ $evento->id }}" class="bg-green-500 hover:bg-green-400 text-white text-sm px-4 py-2 rounded-lg font-semibold transition">
                                    Comprar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $eventos->links() }}
        </div>
    @endif
</div>