<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>OsTracker</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
</head>
<body>
    <header class="container">
        <div class="row pt-3 pb-3 justify-content-between bg-light">
            <div class="col-2 h1">OSTracker</div>
            <div class="col-2 text-right align-self-center">Olá, {usuario}</div>
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