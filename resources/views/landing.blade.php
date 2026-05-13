<x-app-layout>
    {{-- Hero Section --}}
    <section class="relative min-h-[500px] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4')">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 text-center px-6 max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-semibold text-white mb-6">
                Vive experiencias inolvidables
            </h1>
        </div>
    </section>

    {{-- Beneficios --}}
    <section class="bg-[#0d1f20] py-8 border-y border-white/10">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-6 text-white text-center">
            <div class="flex flex-col items-center gap-2">
                <span class="text-3xl">🛡️</span>
                <p class="font-semibold">Pago seguro</p>
                <p class="text-sm text-white/60">Compra 100% segura y confiable.</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <span class="text-3xl">📱</span>
                <p class="font-semibold">Entradas móviles</p>
                <p class="text-sm text-white/60">Lleva tus entradas desde tu celular.</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <span class="text-3xl">🎧</span>
                <p class="font-semibold">Atención 24/7</p>
                <p class="text-sm text-white/60">Estamos aquí para ayudarte.</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <span class="text-3xl">🎫</span>
                <p class="font-semibold">Miles de eventos</p>
                <p class="text-sm text-white/60">Conciertos, deportes, teatro y más.</p>
            </div>
        </div>
    </section>

    {{-- Listado de eventos con búsqueda Livewire --}}
    <section class="bg-[#051F20] min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-white mb-8">Eventos destacados</h2>
            @livewire('eventos-list')
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-[#0d1f20] border-t border-white/10 py-10 text-white/60 text-sm">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div>
                <p class="text-white font-semibold mb-2">TicketWave</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-2">Explorar</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-2">Información</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-2">Empresa</p>
            </div>
        </div>
        <p class="text-center mt-6">@ 2026 eventos, todos los derechos reservados</p>
    </footer>
</x-app-layout>