<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='{{ url('css/bootstrap.min.css') }}'>
    <link rel="stylesheet" href='{{ url('css/estilos.css') }}'>
    <link rel="icon" type="image/x-icon" href='{{ url('imagenes/logo.png') }}'>
    <script src='{{ url('js/script.js') }}'></script>

    <title>Nuva actividad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

 <body onload="prueba('{{$evento->emocion_id}}', '{{ url('imagenes/') }}')">  {{-- cuando carga la ventana hago que se ejecute la función para si hay una emocion seleccionada se muestre --}}

    {{-- CABECERA --}}
    <div class="container-fluid barraNavegacion">
        @include('layouts.navigation')
    </div>
    <div class="container">

        <!-- Alerta  -->
        <div id="notificacion">
            @if (Session::has('notificacion'))
                <div class="alert alert-warning mt-2" role="alert">
                    <strong>{{ Session::get('notificacion') }}</strong>
                </div>
            @endif
        </div>

        <!-- Cuerpo -->
        <div class="cuerpo">
            <div class="row mt-4">
                <div class="col-12 contTitulo">
                    <h1 class="titulo">Nuevo evento</h1>
                </div>
            </div>

            <div class="registros" style="margin-top: 15px">

                {{-- NUEVA ACTIVIDAD --}}
                <div class=" mb-3">
                    <form action='{{ url('trini/add') }}' method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control txt" name="nombreActividad"
                                        placeholder="Nueva Actividad">
                                    <input type="submit" class="btnAnadir" value="+">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <form autocomplete="off" action='{{ url("trini/$evento->id") }}' method="post">
                    @csrf
                    @if ($evento->id)
                        <input type="hidden" name="_method" value="put">
                    @endif


                    {{-- ACTIVIDAD --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <select name="act" class="form-select select">
                                @foreach ($actividades as $item)
                                    @if ($item->id == $evento->actividad_id)
                                        {
                                        <option selected value='{{ $item->id }}'>{{ $item->nombre }}</option>
                                        }
                                    @else{
                                        <option value='{{ $item->id }}'>{{ $item->nombre }}</option>
                                        }
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    <div class="registro" style="background-color: white">
                        <div class="row">
                            <div class="col-12">
                                @foreach ($emociones as $item)
                                    {{-- Asocia al radio la imagen (al seleccionar la imagen se selecciona el radio oculto) --}}
                                    <label>
                                        {{-- <input class="d-none" name="em" type="radio" value="{{ $item->id }}" onclick="prueba({{ $item->id }})"> --}}
                                        <input class="d-none" name="em" type="radio" value="{{ $item->id }}" id="btnEstado" onclick="prueba('{{ $item->id }}', '{{ url('imagenes/') }}')">
                                        <div class="contenerImagenes">
                                            <img class="imagenes" src='{{ url('imagenes/' . $item->imagen) }}'
                                                id="{{ $item->id }}">
                                            <div class="texto-emergente">{{ $item->emocion }}</div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- DESCRIPCION --}}
                    <div class="row mt-3 mb-2">
                        <div class="col-12">
                            <input type="text" class="form-control txt" name="descripcion" placeholder="Descripcion">
                        </div>
                    </div>

                    {{-- BOTON --}}
                    <div class="row mt-4 mb-4">
                        <div class="col-6 contBtnLog">
                            <a href='{{ url('trini') }}' class="btn">CANCELAR</a>
                        </div>
                        <div class="col-6">
                            <input type="submit" value="GUARDAR" class="btn btnN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
