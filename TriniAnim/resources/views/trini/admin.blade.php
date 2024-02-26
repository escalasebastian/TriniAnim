<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <script src="js/script.js"></script>
    <title>Administrador</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="notificacion"></div>
    {{-- CABECERA --}}
    <div class="container-fluid barraNavegacion">
        @include('layouts.navigationAdmin')
    </div>

    {{-- RESTO DE LA WEB --}}
    <div class="container">

        <div class="row mt-4">
            <div class="col-12 contTitulo">
                <h1 class="titulo">Listado de usuarios</h1>
            </div>
        </div>

        @foreach ($usuarios as $usuario)
            <div class="registros2 mb-3 mt-3">
                <div class="row">
                    <div class="col-6">
                        <h2 style="text-align: center">Ususario: <b>{{ $usuario->name }}</b></h2>
                        <button type="button" onclick="loadEmocionAdmin({{ $usuario->id }})" class="btn">Mostrar Resumen</button>
                    </div>
                    <div class="col-6 imgEstado">
                        <div id="{{ 'admin' . $usuario->id }}"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</body>

</html>

