<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='{{url("css/bootstrap.min.css")}}'>
    <link rel="stylesheet" href='{{url("css/estilos.css")}}'>
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <title>Nuva actividad</title>
</head>

<body>
    <div class="container">
        <!-- Cuerpo -->
        <div class="cuerpo">
            <div class="row mt-4">
                <div class="col-12 contTitulo">
                    <h1 class="titulo">NUEVA ACTIVIDAD</h1>
                </div>
            </div>

            <div>
                <form action='{{ url("trini/$evento->id") }}' method="post">
                    @csrf
                    @if ($evento->id)
                        <input type="hidden" name="_method" value="put">
                    @endif

                    {{-- ACTIVIDAD --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-12">
                            <select name="act" class="form-select select">
                                @foreach ($actividades as $item)
                                    <option value='{{ $item->id }}'>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    <div class="registro">
                        <div class="row">
                            <div class="col-12">
                                @foreach ($emociones as $item)
                                    {{-- Asocia al radio la imagen (al seleccionar la imagen se selecciona el radio oculto) --}}
                                    <label>
                                        <input class="d-none" name="em" type="radio" value="{{$item->id}}" onclick="prueba({{$item->id}})" >
                                        <img class="imagenes" src='{{url("imagenes/".$item->imagen)}}' id="{{$item->id}}">
                                    </label>
                                @endforeach
                            </div> 
                        </div>
                    </div>  

                    {{-- DESCRIPCION --}}
                    <div class="row mt-3">
                        <div class="col-12">
                            <input type="text" class="form-control txt" name="descripcion" placeholder="Descripcion">
                        </div>
                    </div>

                    {{-- BOTON --}}
                    <div class="row mt-3">
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
    function prueba(id) {
    //ruta dnd estan las imagenes
    var blade='{{url("imagenes/")}}';
    //recojo las imagenes
    var imagenes=document.getElementsByClassName("imagenes");
    //las recojo
    for(var i=0;i<imagenes.length;i++){
        //Si el id no coincide con el id de la que ha sido seleccionada
        if(imagenes[i].id!=id){
            //la pinto sin color
            imagenes[i].src=blade+"/"+imagenes[i].id+"b.png";
        }
        else{//Si el id coincide
            //la pinto en color
            imagenes[i].src=blade+"/"+id+".png";
        }
    }   
    }   
</script>
