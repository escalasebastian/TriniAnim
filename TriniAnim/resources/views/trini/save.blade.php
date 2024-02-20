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
    <title>Save TriniAnim</title>
</head>

<body>
    <div class="container">
        <h1>Guardar Evento:</h1>
        <form action='{{ url("trini/$evento->id") }}' method="post">
            @csrf
            @if ($evento->id)
                <input type="hidden" name="_method" value="put">
            @endif
            <br>
            Actividad:
            <select name="act" class="form-select">
                @foreach ($actividades as $item)
                    <option value='{{ $item->id }}'>{{ $item->nombre }}</option>
                @endforeach
            </select>
            <br>
            Emocion:
            <br>
            Descripción:
            <input type="text" name="descripcion">
            <br>
            <input type="submit" value="Guardar" class="btn btn-primary m-2">
        </form>

        <a href='{{ url('prueba') }}' class="btn btn-dark m-2">Cancelar</a>
    </div>
</body>

</html>
