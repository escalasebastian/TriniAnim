<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='{{ url('css/bootstrap.min.css') }}'>
    <link rel="stylesheet" href='{{ url('css/estilos.css') }}'>
    <link rel="icon" type="image/x-icon" href='{{ url('imagenes/logo.png') }}'>
    <title>Nuva actividad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
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
                                    <input type="submit" class="btnAnadir" value="+">
                                    <input type="text" class="form-control txt" name="nombreActividad"
                                        placeholder="Nueva Actividad">
                                </div>

                                {{-- @if (session('status') === 'nombre-cambiado')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                        
                    >{{ __('Actividad añadida correctamente.') }}</p>
                @endif --}}
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
                                        <input class="d-none" name="em" type="radio" value="{{ $item->id }}"
                                            onclick="prueba({{ $item->id }})">
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
            </div>

            {{-- BOTON --}}
            <div class="row mt-4 mb-4">
                <div class="col-6 contBtnLog">
                    <a href='{{ url('trini') }}' class="btn">Cancelar</a>
                </div>
                <div class="col-6">
                    <input type="submit" value="Guardar" class="btn btnN">
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    // cuando carga la ventana hago que se ejecute la función para si hay una emocion seleccionada se muestre
    window.onload = prueba({{ $evento->emocion_id }})

    function prueba(id) {
        //ruta dnd estan las imagenes
        var blade = '{{ url('imagenes/') }}';
        //recojo las imagenes
        var imagenes = document.getElementsByClassName("imagenes");
        //las recojo
        for (var i = 0; i < imagenes.length; i++) {
            //Si el id no coincide con el id de la que ha sido seleccionada
            if (imagenes[i].id != id) {
                //la pinto sin color
                imagenes[i].src = blade + "/" + imagenes[i].id + "b.png";
            } else { //Si el id coincide
                //la pinto en color
                imagenes[i].src = blade + "/" + id + ".png";
            }
        }
    }
</script>


{{-- SCRIPT CONTROL ALERTA NOTIFICACION --}}
<script>
    setTimeout(function() {
        document.getElementById('notificacion').style.display = 'none';
    }, 2000);
</script>
