<?php

namespace App\Http\Controllers\Produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Models\Produtos\Ean;
use App\Http\Requests\Produtos\EanRequest;
use App\Enums\UserLevelAdmin;

class EanController extends Controller
{
    public function show()
    {
        $ean = new Ean();
        $eansList = $ean->filterEans(
            ['opt' => 'y']
        );

        $addEan = request()->input('ean_add', '');
        if ($addEan) {
            $eansList[] = $addEan;
        }

        $nivelSite = UserLevelAdmin::label(25);
        $niveisAll = UserLevelAdmin::toArray();

        return view('produtos.ean', [
            'eans' => $eansList,
            'nivelSite' => $nivelSite,
            'niveisAll' => $niveisAll,
        ]);
    }

    public function create()
    {
        return view('produtos.form_ean');
    }

    public function store(EanRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return redirect(route('cean.show', ['ean_add' => $validated['ean']]))
            ->with('message', 'EAN criado com sucesso!');
    }

    public function destroy()
    {
        // delete
    }
}
