<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index()
    {
        $pets = DB::table('pets')->join('tutores', 'pets.tutor_id', '=', 'tutores.id')
            ->select('pets.*', 'tutores.nome as tutor')->orderBy('pets.nome')->get();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $tutores = DB::table('tutores')->orderBy('nome')->get();
        return view('pets.create', compact('tutores'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'tutor_id' => 'required|exists:tutores,id',
            'nome' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'raca' => 'nullable|string|max:80',
            'porte' => 'nullable|in:Pequeno,Médio,Grande',
            'data_nascimento' => 'nullable|date',
        ]);
        $dados['created_at'] = now(); $dados['updated_at'] = now();
        DB::table('pets')->insert($dados);
        return redirect()->route('pets.index')->with('sucesso', 'Pet cadastrado!');
    }

    public function edit(string $id)
    {
        $pet = DB::table('pets')->find($id); abort_if(!$pet, 404);
        $tutores = DB::table('tutores')->orderBy('nome')->get();
        return view('pets.edit', compact('pet', 'tutores'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tutor_id' => 'required|exists:tutores,id',
            'nome' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'raca' => 'nullable|string|max:80',
            'porte' => 'nullable|in:Pequeno,Médio,Grande',
            'data_nascimento' => 'nullable|date',
        ]);
        DB::table('pets')->where('id', $id)->update($request->only('tutor_id','nome','especie','raca','porte','data_nascimento') + ['updated_at' => now()]);
        return redirect()->route('pets.index')->with('sucesso', 'Pet atualizado!');
    }

    public function destroy(string $id)
    {
        DB::table('pets')->where('id', $id)->delete();
        return redirect()->route('pets.index')->with('sucesso', 'Pet excluído!');
    }
}
