<!DOCTYPE html>
<html>
<head>
    <title>OsTracker</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
</head>
<body>

<div class="container-fluid">
    <div class="row" style="height: 50px;">
        <div class="col" style="background-color: red;">.col</div>
    </div>
    <div class="row">
        <div class="row" style="height: 93.7vh; width: 200px;">
            <div class="col" style="background-color: purple; height: 100%">
                <div class="container-fluid" style="height: 100%; width: 100%; padding: 0px;">
                    <div class="col">
                        <div class="row">
                            <a href="" class="navBarButton">TESTE</a>
                        </div>
                        <div class="row">
                            <a href="" class="navBarButton">TESTE</a>
                        </div>
                        <div class="row">
                            <a href="" class="navBarButton">TESTE</a>
                        </div>
                        <div class="row">
                            <a href="" class="navBarButton">TESTE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row justify-content-center" style="margin: 0px"> 
                @yield('content')
            </div>

            <div class="row justify-content-center" style="margin: 0px">
                @yield('lista')
            </div>
            @yield('ordens')
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @yield('listaOrdens')
            @yield('editarOrdem')
        </div>
    </div>
     
</div>

</body>
</html>