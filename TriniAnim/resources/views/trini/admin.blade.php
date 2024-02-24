<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <title>Administrador</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

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
                        <button type="button" onclick="loadEmocion({{ $usuario->id }})" class="btn">Mostrar
                            Resumen</button>
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

{{-- SCRIPT AJAX --}}
<script>
    function loadEmocion(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("admin" + id).innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", '/admin/' + id, true);
        xhttp.send();
    }
</script>
