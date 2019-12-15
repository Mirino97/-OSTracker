<!DOCTYPE html>
<html>
<head>

    {{--Scripts adicionados para o dropdown do usuário--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>OsTracker</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
</head>
<body>
    <header class="container">
        <div class="row pt-3 pb-3 justify-content-between bg-light">
            {{--Título--}}
            <div class="col-2 h1">OSTracker</div>
            {{--/Título--}}

            {{--Botão DropDown do usuário logado--}}
            <div class="dropdown">
                <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width: 32px; height: 32px; border-radius: 50%;">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">Olá, {{Auth::user()->name}} </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/perfil">Perfil</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
            {{--/Botão DropDown do usuário logado--}}
        </div>
    </header>
    <section class="container mt-3">
        <div class="row">
            <div class="col-3">
                <nav>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="" href="/">cliente</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                        <li class="mb-2"><a class="" href="/">link</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                @yield('content')
                <hr>
                @yield('lista')
                @yield('ordens')
                <hr>
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @yield('listaOrdens')
                @yield('editarOrdem')
            </div>
        </div>
    </section>
    <footer class="container"></footer>
</body>
</html>