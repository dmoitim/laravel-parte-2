<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }

    public function entrar(Request $request)
    {
        $autenticado = Auth::attempt($request->only(['email', 'password']));
        if (!$autenticado) {
            return redirect()->back()->withErrors('Usuárioe/ou senha incorreta;');
        }
    }
}
