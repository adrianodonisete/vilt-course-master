<?php

namespace App\Http\Controllers\Produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Models\Produtos\Ean;
use App\Http\Requests\Produtos\EanRequest;

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

        return view('produtos.ean', ['eans' => $eansList]);
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
