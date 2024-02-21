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
        @if (Session::has('notificacion'))
            <div class="alert alert-primary" role="alert">
                <strong>{{ Session::get('notificacion') }}</strong>
            </div>
        @endif

        <!-- Cuerpo -->
        <div class="cuerpo">
            <div class="row mt-4">
                <div class="col-12 contTitulo">
                    <h1 class="titulo">Resumen diario</h1>
                </div>
            </div>

            {{-- REGISTRO --}}
            <div class="registros">
                @foreach ($eventos as $evento)
                <div class="registro mb-3">
                    <form action='{{ url("trini/$evento->id") }}' method="post">
                        <div class="row">
                            <div class="col-12">
                                {{ $evento['fecha'] }}
                                {{ $evento['hora'] }}
                                <b>{{ $evento['emocion'] }}</b>
                                {{ $evento['actividad'] }}
                            </div>
                        </div>
                        
                        @csrf
                    </form>
                </div>
            @endforeach
            </div>
            
            <div class="row">
                <!-- Btn crear -->
                <div class="col-6 contBtnLog">
                    <a class="btn" href="">
                        ESTADO
                    </a>
                </div>
                <div class="col-6">
                    <a href='{{ url('trini/create') }}' class="btn btnN">AÑADIR</a>
                </div>
                
            </div>
        </div>
        
    </div>
</body>

</html>
