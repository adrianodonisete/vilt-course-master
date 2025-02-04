<?php

namespace App\Http\Controllers\GLPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Glpi\ControleTi;
use App\Http\Requests\Glpi\ControleTiRequest;

class ControleTiController extends Controller
{
    public function index(Request $request)
    {
        $paginator = (new ControleTi())->filter(
            $request->input('page', 1),
            $request->all()
        );

        return view('glpi.index', compact('paginator'));
    }

    public function show(int $id)
    {
        $controleTi = (new ControleTi())->one($id);
        return response()->json(
            literal(success: true, message: 'Ok', data: $controleTi)
        );
    }

    // public function create()
    // {
    //     return response()->json(['message' => 'Create method called']);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'priority_number' => 'nullable|numeric',
    //     ]);

    //     $created = (new ControleTi())->createControleTi($validatedData);
    //     return redirect()->route('controle-ti.index')
    //         ->with(
    //             $created ? 'success' : 'error',
    //             $created ? 'ControleTi criado com sucesso.' : 'Erro ao criar ControleTi.'
    //         );
    // }

    public function edit(int $id)
    {
        $controleTi = (new ControleTi())->one($id);
        if (!$controleTi) {
            return redirect()->route('controle-ti.index')
                ->with('error', "ControleTi ID#{$id} não encontrado.");
        }
        return view('glpi.form', compact('controleTi'));
    }

    public function update(ControleTiRequest $request, $id)
    {
        $validated = $request->validated();

        $updated = (new ControleTi())->updateControleTi($id, $validated);
        return redirect()->route('controle-ti.index')
            ->with(
                $updated ? 'success' : 'error',
                $updated ? "ControleTi ID#{$id} atualizado com sucesso." : "Erro ao atualizar ControleTi ID#{$id}."
            );
    }

    // public function destroy($id)
    // {
    //     $deleted = (new ControleTi())->deleteControleTi($id);
    //     return redirect()->route('controle-ti.index')
    //         ->with(
    //             $deleted ? 'success' : 'error',
    //             $deleted ? 'ControleTi excluído com sucesso.' : 'Erro ao excluir ControleTi.'
    //         );
    // }
}
