<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <title>Resumen diario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container min-h-screen">
        @include('layouts.navigation')

        <!-- Alerta  -->

        <div id="notificacion">
            @if (Session::has('notificacion'))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ Session::get('notificacion') }}</strong>
                </div>
            @endif
        </div>



        <!-- Cuerpo -->
        <div class="cuerpo">


            <div class="row mt-4">
                <div class="col-12 contTitulo">
                    <h1 class="titulo">Resumen diario</h1>
                </div>
            </div>
            {{-- AJAX estado --}}
            <div class="row">
                <div class="col-6">
                    <button type="button" onclick="loadEmocion()" class="btn m-5">Mostrar Resumen</button>
                </div>
                <div class="col-6">
                    <div id="resumen"></div>
                </div>
            </div>

            {{-- REGISTRO --}}
            <div class="registros">
                @foreach ($eventos as $evento)
                    <div class="registro mb-3">
                        <form action='{{ url("trini/$evento->id") }}' method="post">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-12">
                                    {{ $evento['fecha'] }}
                                    {{ $evento['hora'] }}
                                    <b>{{ $evento['emocion'] }}</b>
                                    {{ $evento['actividad'] }}
                                </div>
                            </div>


                            <input type="submit" value="Eliminar" class="btn  ml-4 mt-2 mb-2">
                            <!-- botones -->
                            <a href='{{ url("trini/$evento->id/edit") }}' class="btn  m-1">Editar</a>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <!-- Btn crear -->

                {{-- <div class="col-6 contBtnLog">
                    <a class="btn" href="">
                        ESTADO
                    </a>
                </div> --}}

                <div class="col-12" style="text-align: center">
                    <a href='{{ url('trini/create') }}' class="btn btnN">AÑADIR</a>
                </div>

            </div>
        </div>

    </div>
</body>

</html>

{{-- SCRIPT AJAX --}}
<script>
    function loadEmocion() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resumen").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", '/resumen', true);
        xhttp.send();
    }
</script>


{{-- SCRIPT CONTROL ALERTA NOTIFICACION --}}
<script>
    setTimeout(function() {
        document.getElementById('notificacion').style.display = 'none';
    }, 1500);
</script>
