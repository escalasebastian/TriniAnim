<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- userName -->
        <div>
            <x-input-label for="userName" :value="__('Nombre de Usuario')" />
            <x-text-input id="userName" class="block mt-1 w-full" type="text" name="userName" :value="old('userName')" required autofocus autocomplete="username" placeholder="USUARIO"/>
            <x-input-error :messages="$errors->get('userName')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recordar Usuario') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Acceder') }}
            </x-primary-button>


            <a href="{{route('register')}}">
                 <x-secondary-button class="ms-3">
                    {{('Nuevo usuario') }}
                
                 </x-secondary-button>
            </a>

           
            
        </div>
    </form>
</x-guest-layout>
