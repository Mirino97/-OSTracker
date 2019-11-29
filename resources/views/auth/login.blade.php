@extends('layouts.app')
@section('content')
<div class="container d-flex flex-column justify-content-center align-self-center align-content-center align-items-center" style="height: 100vh;">
    <h1>OsTracker</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3 w-100">
            <input placeholder="E-Mail" id="email" type="email" class="p-3 w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3 w-100">
            <input placeholder="Senha" id="password" type="password" class="p-3 w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-2 text-center">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                Lembrar de mim?
            </label>
        </div>

        @if (Route::has('password.request'))
        <a class="btn btn-warning text-white" href="{{ route('password.request') }}">
            Esqueceu a senha?
        </a>
        @endif

        <button type="submit" class="btn btn-primary">
            Entrar
        </button>
    </form>
</div>
@endsection