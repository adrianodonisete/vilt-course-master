<?php

namespace App\Http\Controllers\Produtos;

use App\Http\Controllers\Controller;
use App\Models\Produtos\Ean;

class EanController extends Controller
{
    public function show()
    {
        $ean = new Ean();
        $eansList = $ean->filterEans(
            ['opt' => 'y']
        );
        return view('produtos.ean', ['eans' => $eansList]);
    }

    public function store()
    {
        // salvar
    }

    public function destroy()
    {
        // delete
    }
}
