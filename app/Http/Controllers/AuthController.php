<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function showRegister(){
        return view('auth.register');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success', 'Login correcto');
        }
        return redirect('/login')->with('error', 'Usuario y/o Contraseña incorrectos');
    }

    public function register(Request $request){
        $user = User::create([  
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password)
        ]);

        if($user){
            return redirect('/login')->with('success', 'Registro correcto'); 
        }
        return redirect('/register')->with('error', 'Error al iniciar session');
    }
}
