<?php

namespace App\Traits\Glpi;

use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

trait FilterControleTi
{
    public function makeFilters(Builder $result, array $filters): Builder
    {
        if (isset($filters['date_creation_ini']) && isset($filters['date_creation_end'])) {
            $result->whereBetween('date_creation', [
                Carbon::parse($filters['date_creation_ini'])->startOfDay(),
                Carbon::parse($filters['date_creation_end'])->endOfDay(),
            ]);
        } else {
            $result->whereBetween('date_creation', [
                Carbon::now()->subMonth(2)->startOfDay(),
                Carbon::now()->endOfDay(),
            ]);
        }

        if (filled($filters)) {
            foreach ($filters as $column => $value) {
                if (in_array($column, ['date_creation_ini', 'date_creation_end'])) {
                    continue;
                }
                $result->where($column, $value);
            }
        }

        return $result;
    }
}
