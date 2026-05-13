<x-filament-panels::page>
    <div style="display: flex; flex-direction: column; align-items: center; padding: 2rem 0 1rem;">
        {{-- Avatar circular --}}
        <div style="width: 100px; height: 100px; border-radius: 50%; background-color: #1e4a3a; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
            <span style="font-size: 2.5rem; font-weight: 700; color: #6ee7b7;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </span>
        </div>

        {{-- Nombre --}}
        <h2 style="font-size: 1.5rem; font-weight: 700; color: white; text-align: center; margin-bottom: 2rem;">
            {{ Auth::user()->name }}
        </h2>

        {{-- Tarjeta Mi Información --}}
        <div style="width: 100%; max-width: 560px; background-color: #0f2d26; border: 1px solid #1e4a3a; border-radius: 0.75rem; padding: 1.5rem;">
            <h3 style="font-size: 1rem; font-weight: 600; color: white; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 1px solid #1e4a3a;">
                Mi Información
            </h3>
            <div style="display: grid; gap: 0.5rem; font-size: 0.875rem;">
                <p style="color: #9ca3af;">
                    <span style="font-weight: 600; color: #d1fae5;">Nombre(s):</span>
                    {{ Auth::user()->name }}
                </p>
                <p style="color: #9ca3af;">
                    <span style="font-weight: 600; color: #d1fae5;">Correo Electrónico:</span>
                    {{ Auth::user()->email }}
                </p>
            </div>

            {{-- Botones --}}
            <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                <a href="/admin/profile"
                   style="background-color: #6ee7b7; color: #0a1f1a; font-weight: 600; font-size: 0.875rem; padding: 0.5rem 1.25rem; border-radius: 9999px; text-decoration: none;">
                    Editar Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            style="background-color: transparent; border: 1px solid #6ee7b7; color: #6ee7b7; font-weight: 600; font-size: 0.875rem; padding: 0.5rem 1.25rem; border-radius: 9999px; cursor: pointer;">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-filament-panels::page>