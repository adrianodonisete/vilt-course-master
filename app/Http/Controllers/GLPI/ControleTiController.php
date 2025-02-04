<?php

namespace App\Http\Controllers\GLPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Glpi\ControleTi;

class ControleTiController extends Controller
{
    public function index(Request $request)
    {
        $currentPage = $request->input('page', 1);
        $paginator = (new ControleTi())->filter($currentPage);
        $result = $paginator->items();
        return view('glpi.index', compact('result', 'paginator'));
    }

    public function show(int $id)
    {
        $controleTi = (new ControleTi())->one($id);
        return response()->json(
            literal(success: true, message: 'Ok', data: $controleTi)
        );
    }

    public function create()
    {
        return response()->json(['message' => 'Create method called']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_ticket' => 'required|integer',
            'name' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'date_mod' => 'required|date',
            'note' => 'nullable|string',
            'proj' => 'nullable|string',
            'jira' => 'nullable|string',
            'area' => 'required|integer',
            'status' => 'required|integer',
            'priority_order' => 'required|integer',
            'priority_number' => 'required|numeric',
        ]);

        $created = (new ControleTi())->createControleTi($validatedData);
        return redirect()->route('controle-ti.index')
            ->with(
                $created ? 'success' : 'error',
                $created ? 'ControleTi criado com sucesso.' : 'Erro ao criar ControleTi.'
            );
    }

    public function edit($id)
    {
        $controleTi = (new ControleTi())->one($id);
        if (!$controleTi) {
            return redirect()->route('controle-ti.index')
                ->with('error', 'ControleTi não encontrado.');
        }
        return view('glpi.form', compact('controleTi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'proj' => 'nullable|string',
            'jira' => 'nullable|string',
            'priority_order' => 'required|integer',
            'priority_number' => 'required|numeric',
        ]);

        dd($validated);

        $updated = (new ControleTi())->updateControleTi($id, $validated);
        return redirect()->route('controle-ti.index')
            ->with(
                $updated ? 'success' : 'error',
                $updated ? 'ControleTi atualizado com sucesso.' : 'Erro ao atualizar ControleTi.'
            );
    }

    public function destroy($id)
    {
        $deleted = (new ControleTi())->deleteControleTi($id);
        return redirect()->route('controle-ti.index')
            ->with(
                $deleted ? 'success' : 'error',
                $deleted ? 'ControleTi excluído com sucesso.' : 'Erro ao excluir ControleTi.'
            );
    }
}
