<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo.png">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <!-- <div class="cabecera">
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
        </div> -->
        <div class="cuerpo">
            <div class="row mt-4">
                <div class="col-12 contTitulo">
                    <h1 class="titulo">Nuevo registro</h1>
                </div>
            </div>
            <form autocomplete="off" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="registros" style="margin-top: 15px">
                    <div class="row mt-1">
                        {{-- NOMBRE --}}
                        <div class="col-12">
                            {{-- <input type="text" name="nombre" class="form-control txt" placeholder="Usuario"> --}}
                            <input  class="form-control txt" type="text" name="name" value="{{ old('name') }}" autofocus  placeholder="Nombre">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
    
                        {{-- NOMBRE usuario --}}
                        <div class="col-12 mt-4">
                            {{-- <input type="text" name="nombre" class="form-control txt" placeholder="Usuario"> --}}
                            <input class="form-control txt" type="text" name="userName" value="{{ old('userName') }}" placeholder="Usuario" >
                            <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                        </div>
    
                        {{-- CONTRASEÑA --}}
                        <div class="col-12 mt-4">
                            <input type="password" name="password" class="form-control txt" placeholder="Contraseña">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
    
                        {{-- Confirmar Contraseña --}}
                        <div class="col-12 mt-4 mb-3">
                            <input type="password" name="password_confirmation" class="form-control txt" placeholder="Confirmar contraseña">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>  
                </div>
                 
                <div class="row mt-4">
                    <div class="col-6 contBtnLog">
                        <a class="btn" href="{{ route('login') }}">
                            ¿Ya registrado?
                        </a>
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn" id="btnL" value="REGISTRARSE">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="name">Nombre Completo</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                @error('name')
                    <p class="mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre de Usuario -->
            <div class="mt-4">
                <label for="userName">Usuario</label>
                <input id="userName" class="block mt-1 w-full" type="text" name="userName" value="{{ old('userName') }}" required autofocus autocomplete="userName" />
                @error('userName')
                    <p class="mt-2">{{ $message }}</p>
                @enderror
            </div>
        
            <!-- Contraseña -->
            <div class="mt-4">
                <label for="password">Contraseña</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                @error('password')
                    <p class="mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <label for="password_confirmation">Confirma Contraseña</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <p class="mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    ¿Ya registrado?
                </a>

                <button type="submit" class="ms-4">Registrar</button>
            </div>
        </form>
    </x-guest-layout>
</body>
</html> --}}
