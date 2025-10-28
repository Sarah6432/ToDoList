<x-guest-layout>
    <h4 class="text-center mb-4">Entrar</h4>

    <x-auth-session-status class="alert alert-info mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required autofocus>

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Senha') }}</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror"
                   type="password"
                   name="password"
                   required autocomplete="current-password" />

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Lembrar-me') }}</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            @if (Route::has('password.request'))
                <a class="small" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary px-4">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>
</x-guest-layout>
