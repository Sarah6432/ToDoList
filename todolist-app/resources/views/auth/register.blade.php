<x-guest-layout>
    <h4 class="text-center mb-4">Registrar Nova Conta</h4>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror"
                   type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required autofocus autocomplete="name">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required autocomplete="username">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Senha') }}</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror"
                   type="password"
                   name="password"
                   required autocomplete="new-password" />

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
            <input id="password_confirmation" class="form-control"
                   type="password"
                   name="password_confirmation"
                   required autocomplete="new-password" />
        </div>

        <div class="d-flex justify-content-end align-items-center mt-4">
            <a class="small me-3" href="{{ route('login') }}">
                {{ __('Já Possui Cadastro?') }}
            </a>

            <button type="submit" class="btn btn-primary px-4">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>
</x-guest-layout>
