<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request,Redirector $redirect){
        $recuerdame = $request->filled('recuerdame');
        if(Auth::attempt($request->only('correo','password'),$recuerdame)){
            if(Auth::user()->idRol === 0){
                $request->session()->regenerate();
                return $redirect
                ->intended('menu-administrativo')
                ->with('status','Usuario Logeado');
            }
            if(Auth::user()->idRol === 1){
                $request->session()->regenerate();
                return $redirect
                ->intended('menu-cliente')
                ->with('status','Cliente Logeado');
            }
        }
        throw ValidationException::withMessages([
            'correo' => __('auth.failed')
        ]);
    }
    public function logout(Request $request,Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')->with('status','session cerrada');
    }
}
