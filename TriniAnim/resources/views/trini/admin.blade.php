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
    
    @include('layouts.navigation')

    <h2>eres admin</h2>

    @foreach($usuarios as $usuario)
    <h2>{{$usuario->name}}</h2>
    {{-- AJAX estado --}}
    <div class="row">
        <div class="col-6">
            <button type="button" onclick="loadEmocion({{$usuario->id}})" class="btn m-5" >Mostrar Resumen</button>
        </div>
        <div class="col-6">
            <div id="{{"admin".$usuario->id}}"></div>
        </div>
    </div>
    @endforeach
</body>
</html>

{{--SCRIPT AJAX--}}
<script>
    function loadEmocion(id) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("admin"+id).innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", '/admin/'+id, true);
      xhttp.send();
    }
</script>