<?php

namespace App\Traits\Glpi;

use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

trait FilterControleTi
{
    public function makeFilters(Builder $result, array $filters): Builder
    {
        $date_creation_ini = $filters['date_creation_ini'] ?? null;
        $date_creation_end = $filters['date_creation_end'] ?? null;

        if ($date_creation_ini && $date_creation_end) {
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

        foreach ($filters as $filter => $value) {
            $value = trim($value);
            $isValid = $this->isFilter($filter) && filled($value);

            if ($isValid && $this->isLike($filter)) {
                $result->where($filter, 'like', "%{$value}%");
            } elseif ($isValid) {
                $result->where($filter, $value);
            }
        }

        return $result;
    }

    public function isLike(string $filter): bool
    {
        $like = [
            'name',
            'proj',
            'jira',
        ];
        return in_array($filter, $like);
    }

    public function isFilter(string $filter): bool
    {
        $valid = [
            'id',
            'id_ticket',
            'name',
            'proj',
            'jira',
        ];
        return in_array($filter, $valid);
    }
}
