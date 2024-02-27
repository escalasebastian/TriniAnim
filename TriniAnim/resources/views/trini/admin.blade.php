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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Administrador</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body onload='crearGrafico({!! $emociones !!}, {!! $eventos !!})'>

    {{-- Div vacio notificación --}}
    <div id="notificacion"></div>

    {{-- CABECERA --}}
    <div class="container-fluid barraNavegacion">
        @include('layouts.navigationAdmin')
    </div>

    {{-- RESTO DE LA WEB --}}
    <div class="container">

        {{-- Gráfico --}}
        <div class="row mt-4">
            <div class="col-12 contTitulo">
                <h1 class="titulo">Emociones de los usuarios</h1>
            </div>
        </div>
        <div class="registros">
            <div class="input-group">
                <span id="txtTipoGrafico">Tipo de gráfico:</span>
                <select name="tipoGrafico" id="tipoGrafico"
                    onchange='crearGrafico({!! $emociones !!}, {!! $eventos !!})' class="form-select"
                    style="border-color: #69699B;text-align: center;">
                    <option value="pie">Tarta</option>
                    <option value="doughnut">Donut</option>
                    {{-- <option value="bar">Barras</option> --}}
                </select>
            </div>

            <div class="d-flex justify-content-center mb-2">
                <canvas id="grafico" style="width:100%;max-width:600px"></canvas> {{-- CSS!!! --}}
            </div>
        </div>

        {{-- Eventos --}}
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
                        <button type="button" onclick="loadEmocionAdmin({{ $usuario->id }})" class="btn">Mostrar
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
