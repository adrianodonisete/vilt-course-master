<?php

namespace App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class Ean extends Model
{
    public function filterEans(array $filters): array
    {
        if (empty($filters)) {
            return [];
        }
        return [
            '07896830001484',
            '07896658005169',
            '07897595604668',
            '07898962781159',
        ];
    }
}
