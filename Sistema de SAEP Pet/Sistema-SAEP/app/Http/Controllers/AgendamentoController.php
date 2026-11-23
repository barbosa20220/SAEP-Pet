<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = DB::table('agendamentos')
            ->join('pets', 'agendamentos.pet_id', '=', 'pets.id')
            ->join('tutores', 'pets.tutor_id', '=', 'tutores.id')
            ->select('agendamentos.*', 'pets.nome as pet', 'tutores.nome as tutor')
            ->orderBy('data_agendamento')->orderBy('horario')->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $pets = DB::table('pets')->join('tutores', 'pets.tutor_id', '=', 'tutores.id')
            ->select('pets.id', 'pets.nome', 'tutores.nome as tutor')->orderBy('pets.nome')->get();
        return view('agendamentos.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'data_agendamento' => 'required|date|after_or_equal:today',
            'horario' => 'required|date_format:H:i',
            'servico' => 'required|in:Banho,Tosa,Banho e tosa,Consulta',
            'observacao' => 'nullable|string|max:1000',
        ]);
        $dados['status'] = 'Pendente'; $dados['created_at'] = now(); $dados['updated_at'] = now();
        DB::table('agendamentos')->insert($dados);
        return redirect()->route('agendamentos.index')->with('sucesso', 'Agendamento criado!');
    }

    public function edit(string $id)
    {
        $agendamento = DB::table('agendamentos')->find($id); abort_if(!$agendamento, 404);
        $pets = DB::table('pets')->join('tutores', 'pets.tutor_id', '=', 'tutores.id')
            ->select('pets.id', 'pets.nome', 'tutores.nome as tutor')->orderBy('pets.nome')->get();
        return view('agendamentos.edit', compact('agendamento', 'pets'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'data_agendamento' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'servico' => 'required|in:Banho,Tosa,Banho e tosa,Consulta',
            'status' => 'required|in:Pendente,Confirmado,Em andamento,Concluído,Cancelado',
            'observacao' => 'nullable|string|max:1000',
        ]);
        DB::table('agendamentos')->where('id', $id)->update($request->only('pet_id','data_agendamento','horario','servico','status','observacao') + ['updated_at' => now()]);
        return redirect()->route('agendamentos.index')->with('sucesso', 'Agendamento atualizado!');
    }

    public function destroy(string $id)
    {
        DB::table('agendamentos')->where('id', $id)->delete();
        return redirect()->route('agendamentos.index')->with('sucesso', 'Agendamento excluído!');
    }
}
