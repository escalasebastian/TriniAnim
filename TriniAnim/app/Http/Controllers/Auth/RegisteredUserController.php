<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'userName' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed','min:4','max:10' ],
        ]);

        /*
        'password' => ['required', 'confirmed','min:4','max:10', Password::min(4)
                                                                    ->mixedCase()
                                                                    ->numbers()]
        */

        $user = User::create([
            'name' => $request->name,
            'userName' => $request->userName,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect('/');
    }
}
