<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />    
</head>
<body>
    <div class="container">
        @guest
        {{-- <a href="{{ route('login') }}">{{ __('Login') }}</a> --}}
        @if (Route::has('register'))
        {{-- <a href="{{ route('register') }}">{{ __('Register') }}</a> --}}
        @endif
        @else
        <a href="#">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
        @yield('content')
    </div>
</body>
</html>