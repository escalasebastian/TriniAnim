<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página</title>
</head>
<body>
    <!-- Session Status -->
    <div class="mb-4">
        <!-- Aquí iría el contenido del componente 'x-auth-session-status' -->
        <!-- Este componente podría ser un mensaje de éxito, error, etc. -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Nombre de Usuario -->
        <div>
            <label for="userName" class="block font-medium text-sm text-gray-700">Nombre de Usuario</label>
            <input id="userName" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="userName" value="{{ old('userName') }}" required autofocus autocomplete="username" placeholder="USUARIO">
            <!-- Aquí irían los mensajes de error relacionados con el campo 'userName' -->
            <x-input-error :messages="$errors->get('userName')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">Contraseña</label>
            <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password">
            <!-- Aquí irían los mensajes de error relacionados con el campo 'password' -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordar Usuario -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Recordar Usuario</span>
            </label>
        </div> --}}

        <!-- Botones -->
        <div class="flex items-center justify-end mt-4">
            <!-- Enlace 'Olvidaste tu contraseña?' -->
            {{-- <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Olvidaste tu contraseña?</a> --}}

            <!-- Botón 'Acceder' -->
            <button type="submit" class="ms-3 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Acceder</button>

            <!-- Enlace 'Nuevo usuario' -->
            <a href="{{ route('register') }}" class="ms-3 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Nuevo usuario</a>
        </div>
    </form>
</body>
</html>