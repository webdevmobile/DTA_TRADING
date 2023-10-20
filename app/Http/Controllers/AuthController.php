<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        // dd($user->role);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }
        return to_route('auth.login')->withErrors([
            'password' => 'email ou mot de passe invalide'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    public function invalidStatut()
    {
        return view('auth.invalid_statut');
    }
}
