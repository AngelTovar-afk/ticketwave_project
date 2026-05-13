<x-guest-layout>
    <div style="text-align: center; margin-bottom: 1.25rem;">
        <h1 style="font-family: 'Poppins'; font-weight: 700; font-size: 2rem; line-height: 1; color: white; margin-bottom: 0.5rem;">
            <span style="color: #6ee7b7;">T</span>icketwave
        </h1>
        <p style="color: #d1fae5; font-size: 0.875rem; font-weight: 400; margin-bottom: 0.25rem;">
            Tu próximo gran momento empieza aquí
        </p>
        <p style="color: white; font-size: 1rem; font-weight: 600;">
            Inicio de sesión
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="text-align: left;">
        @csrf
        <div style="text-align: left; margin-top: 1.25rem;">
            <label style="display: block; color: #9ca3af; font-size: 0.75rem; margin-bottom: 0.25rem;" for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                style="width: 93%; background: rgba(255,255,255,0.9); border: none; border-radius: 0.5rem; padding: 0.65rem 0.875rem; color: #111; font-size: 0.875rem;" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

       <div style="text-align: left; margin-top: 1.25rem;">
            <label style="display: block; color: #9ca3af; font-size: 0.75rem; margin-bottom: 0.25rem;" for="password">Contraseña</label>
            <input id="password" type="password" name="password" required
                style="width: 93%; background: rgba(255,255,255,0.9); border: none; border-radius: 0.5rem; padding: 0.65rem 0.875rem; color: #111; font-size: 0.875rem;" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div style="margin-bottom: 1rem;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color: #9ca3af; font-size: 0.8rem; text-decoration: none;">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <button type="submit" style="width: 100%; background: #6ee7b7; color: #0a1f1a; font-weight: 600; padding: 0.65rem; border-radius: 9999px; border: none; cursor: pointer; font-size: 0.9rem;">
            Iniciar sesión
        </button>
    </form>

    <div style="text-align: center; margin-top: 1.25rem;">
        <p style="color: #9ca3af; font-size: 0.8rem; margin-bottom: 0.5rem;">¿No tienes una cuenta?</p>
        <a href="{{ route('register') }}" style="display: block; border: 1px solid #6ee7b7; color: #6ee7b7; font-weight: 600; padding: 0.65rem; border-radius: 9999px; text-align: center; text-decoration: none; font-size: 0.9rem;">
            ¡Regístrate!
        </a>
    </div>
</x-guest-layout>