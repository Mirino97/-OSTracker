<!DOCTYPE html>
<html>
<head>
    <title>OsTracker</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
</head>
<body>

    <div id="navbar">
        <div id="navbar-logo">
            <p>LOGO</p>
        </div>
        <div id="filler"></div>
        <a href="" class="button">
            Clientes
        </a>
        <a href="" class="button">
            Serviços
        </a>
        <a href="" class="button">
            Financeiro
        </a>
    </div>

    <div id="container">

	   @yield('content')
       @yield('lista')
       @yield('ordens')

    </div>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @yield('listaOrdens')


</body>
</html>