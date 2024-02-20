<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumen diario - TriniAnim</title>
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

        <!-- MOSTRAR RESUMEN DE EMOCIONES -->

        <button type="button" onclick="loadEmocion()" class="btn btn-danger mt-5" style="background-color: black">Mostrar Resumen</button>
        <div id="resumen"></div>


        


        @foreach ($eventos as $evento)
            <div class="m-3" style="background-color: gray">
                <form action='{{ url("trini/$evento->id") }}' method="post"> <!-- Esto es para el delete? -->
                    {{ $evento['actividad'] }}
                    {{ $evento['emocion'] }}
                    {{ $evento['fecha'] }}
                    {{ $evento['hora'] }}
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Eliminar" class="btn btn-primary ml-4 mt-2 mb-2">
                    <!-- botones -->

                    {{--
                    <a href='{{ url("trini/$evento->id/edit") }}' class="btn btn-primary m-1">Editar</a>
                    <!-- Voy a la url de edicion con el id del que quiero editar -->
                    <!-- Primera forma de hacer el ver, te lleva a otra página -->
                    <a href='{{ url("trini/$evento->id") }}' class="btn btn-primary m-1">Ver en otra página</a>
                    <!-- Segunda forma de hacer el ver, misma página, usa AJAX -->
                    <button type="button" class="btn btn-primary m-1" onclick="cargar({{ $evento->id }})">Ver en la
                        misma
                        página</button>
                        --}}
                    
                </form>
            </div>
        @endforeach

        <!-- Btn crear -->
        <a href='{{ url('trini/create') }}' class="btn btn-dark m-1">Crear evento</a>
    </div>
</body>

</html>

{{--SCRIPT AJAX--}}
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


{{--SCRIPT CONTROL ALERTA NOTIFICACION--}}
<script>
    setTimeout(function(){
        document.getElementById('notificacion').style.display = 'none';
    }, 1500);
</script>