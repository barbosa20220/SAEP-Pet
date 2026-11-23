<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function form()
    {
        if (session()->has('usuario_id')) return redirect()->route('inicio');
        return view('login');
    }

    public function cadastro()
    {
        return view('cadastro');
    }

    public function registrar(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:usuarios,email'],
            'senha' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $id = DB::table('usuarios')->insertGetId([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'senha' => Hash::make($dados['senha']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $request->session()->regenerate();
        $request->session()->put(['usuario_id' => $id, 'usuario_nome' => $dados['nome']]);

        return redirect()->route('inicio')->with('sucesso', 'Conta criada com sucesso!');
    }

    public function entrar(Request $request)
    {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
        ]);

        $usuario = DB::table('usuarios')->where('email', $dados['email'])->first();

        if (!$usuario || !Hash::check($dados['senha'], $usuario->senha)) {
            throw ValidationException::withMessages(['email' => 'E-mail ou senha incorretos.']);
        }

        $request->session()->regenerate();
        $request->session()->put(['usuario_id' => $usuario->id, 'usuario_nome' => $usuario->nome]);

        return redirect()->route('inicio');
    }

    public function sair(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('sucesso', 'Você saiu do sistema.');
    }
}
