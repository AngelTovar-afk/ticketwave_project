<x-filament-widgets::widget>
    <x-filament::section heading="Actividad reciente">
        <div>
            @forelse($this->getPedidos() as $pedido)
                @php
                    $color = match($pedido->estado) {
                        'confirmado' => '#4ade80',
                        'pendiente'  => '#facc15',
                        'cancelado'  => '#f87171',
                        default      => '#9ca3af',
                    };
                @endphp

                <div style="display:flex; align-items:flex-start; gap:12px; padding:10px 0; border-bottom:1px solid rgba(255,255,255,0.05);">
                    <div style="margin-top:5px; width:10px; height:10px; border-radius:50%; flex-shrink:0; background-color:{{ $color }};"></div>
                    <div style="flex:1;">
                        <p style="font-size:0.875rem; color:white; font-weight:600; margin:0;">
                            {{ $pedido->usuario->name ?? 'Usuario' }}
                            <span style="font-weight:400; color:#9ca3af;">—</span>
                            <span style="color:{{ $color }};">${{ number_format($pedido->monto_total, 2) }} MXN</span>
                        </p>
                        <p style="font-size:0.75rem; color:#9ca3af; margin:2px 0 0;">
                            Pedido #{{ $pedido->id }} · {{ ucfirst($pedido->estado) }} · {{ $pedido->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @empty
                <p style="font-size:0.875rem; color:#9ca3af; text-align:center; padding:1rem 0;">
                    Sin actividad reciente
                </p>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>