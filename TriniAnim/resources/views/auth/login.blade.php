<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- ENLACES A PUBLIC --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <title>TriniAnim</title>
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <div class="row">
                <div class="col-3 col-sm-4 contenedorLinea">
                    <div class="linea"></div>
                </div>
                <div class="col-6 col-sm-4">
                    <img class="logo" src="imagenes/logo.png">
                </div>
                <div class="col-3 col-sm-4 contenedorLinea">
                    <div class="linea"></div>
                </div>
            </div>
        </div>
        <div class="cuerpo">
            <!-- Session Status -->
            {{-- <div class="mb-4"> --}}
                <!-- Aquí iría el contenido del componente 'x-auth-session-status' -->
                <!-- Este componente podría ser un mensaje de éxito, error, etc. -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            {{-- </div> --}}

            <form autocomplete="off" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="registros" style="margin-top: 25px">
                    <div class="row mt-2">
                        <!-- Nombre de Usuario -->
                        <div class="col-12">
                            {{-- <input type="text" name="nombre" class="form-control txt" placeholder="Usuario"> --}}
                            <input type="text" name="userName" class="form-control txt" value="{{ old('userName') }}" autofocus placeholder="Usuario">
                            <!-- Aquí irían los mensajes de error relacionados con el campo 'userName' -->
                            <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                        </div>
                        <!-- Contraseña -->
                        <div class="col-12 mt-4 mb-3">
                            {{-- <input type="text" name="contraseña" class="form-control txt" placeholder="Contraseña"> --}}
                            <input type="password" name="password" class="form-control txt" placeholder="Contraseña">
                            <!-- Aquí irían los mensajes de error relacionados con el campo 'password' -->
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>   
                </div>

                <div class="row mt-4">
                    <div class="col-6 contBtnLog">
                        {{-- <input type="submit" class="btn" id="btnL" value="LOGIN"> --}}
                        <!-- Botón 'Acceder' -->
                        <button type="submit" class="btn" id="btnL">LOGIN</button>
                    </div>
                    <div class="col-6">
                        {{-- <input type="submit" class="btn" value="REGISTRARSE"> --}}
                        <!-- Enlace 'Nuevo usuario' -->
                        <a href="{{ route('register') }}" class="btn btnSecundario">REGISTRARSE</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="pie">

        </div>
    </div>
</body>
</html>
