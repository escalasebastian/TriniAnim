<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

    public function updateNombre(Request $request){
        
        $user=Auth::user();
    
       $sqlDb=DB::table('users')
                    ->where('id', $user->id)
                    ->update(['name'=> $request->name]);

        return Redirect::route('profile.edit')->with('status', 'nombre-cambiado');
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //NO FUNCIONA EL METODO CON NUSETRAS CONDICIONES

        return "ok";
        /*
        $request->user()->fill($request->validated());
    */

        /*
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        */
        /*
        $request->user()->save();
*/
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
