<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{

   public function index(Request $request)
    {
        $query = Tarefa::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tarefas = $query->latest()->get();

        return view("tarefas.index", ['tarefas' => $tarefas]);
    }

    public function create(){
        return view("tarefas.create");
    }

    public function store(Request $request){
     $dadosValidados = $request->validate([
       'nome' => 'required|string|max:255',
       'descricao' => 'nullable|string|max:255',
       'status' => 'required|string|max:20',

   ]);

   Tarefa::create($dadosValidados);

   return redirect()->route('tarefas.index');
    }

    public function restore($id)
{
    $tarefa = Tarefa::onlyTrashed()->findOrFail($id);
    $tarefa->restore();

    return redirect()->route('tarefas.index')->with('success', 'Tarefa restaurada com sucesso!');
}
   public function edit($id){
    $tarefa = Tarefa::findOrFail($id);

    return view('tarefas.edit', ['tarefa' => $tarefa]);
}

   public function update(Request $request, $id)
{

    $tarefa = Tarefa::findOrFail($id);

    $dadosValidados = $request->validate([
        'nome' => 'required|string|max:300',
        'descricao' => 'nullable|string|max:255',
        'status' => 'required|string|max:20',
    ]);

    $tarefa->update($dadosValidados);

    return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada!');
}
   public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa movida para a lixeira!');
    }
public function lixeira()
    {
        $tarefasNaLixeira = Tarefa::onlyTrashed()->get();

        return view('tarefas.lixeira', ['tarefas' => $tarefasNaLixeira]);
    }
    public function forceDelete($id)
    {
        $tarefa = Tarefa::onlyTrashed()->findOrFail($id);
        $tarefa->forceDelete();

        return redirect()->route('tarefas.lixeira')->with('success', 'Tarefa excluída permanentemente!');
    }

}
