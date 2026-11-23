<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        $tutores = DB::table('tutores')
            ->when($request->pesquisa, fn($q, $v) => $q->where('nome', 'like', "%{$v}%"))
            ->orderBy('nome')->get();
        return view('tutores.index', compact('tutores'));
    }

    public function create() { return view('tutores.create'); }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:120',
            'cpf' => 'nullable|string|max:14|unique:tutores,cpf',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:150',
            'endereco' => 'nullable|string|max:255',
        ]);
        $dados['created_at'] = now(); $dados['updated_at'] = now();
        DB::table('tutores')->insert($dados);
        return redirect()->route('tutores.index')->with('sucesso', 'Tutor cadastrado!');
    }

    public function edit(string $id)
    {
        $tutor = DB::table('tutores')->find($id);
        abort_if(!$tutor, 404);
        return view('tutores.edit', compact('tutor'));
    }

    public function update(Request $request, string $id)
    {
        $tutor = DB::table('tutores')->find($id); abort_if(!$tutor, 404);
        $dados = $request->validate([
            'nome' => 'required|string|max:120',
            'cpf' => 'nullable|string|max:14|unique:tutores,cpf,'.$id,
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:150',
            'endereco' => 'nullable|string|max:255',
        ]);
        $dados['updated_at'] = now();
        DB::table('tutores')->where('id', $id)->update($dados);
        return redirect()->route('tutores.index')->with('sucesso', 'Tutor atualizado!');
    }

    public function destroy(string $id)
    {
        DB::table('tutores')->where('id', $id)->delete();
        return redirect()->route('tutores.index')->with('sucesso', 'Tutor excluído!');
    }
}
