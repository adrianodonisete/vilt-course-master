<?php

namespace App\Models\Glpi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

use App\Traits\Glpi\FilterControleTi;
use Illuminate\Pagination\LengthAwarePaginator;

class ControleTi extends Model
{
    use FilterControleTi;

    const PER_PAGE = 50;

    protected $connection = 'mariaglpi';
    protected $table = 'controle_ti';

    protected $fillable = [
        'id',
        'id_ticket',
        'name',
        'date_creation',
        'date_mod',
        'note',
        'proj',
        'jira',
        'area',
        'status',
        'priority_order',
        'priority_number',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'id_ticket' => 'integer',
            'date_creation' => 'datetime',
            'date_mod' => 'datetime',
            'area' => 'integer',
            'status' => 'integer',
            'priority_order' => 'integer',
            'priority_number' => 'decimal:14,6',
        ];
    }

    protected function priorityNumber(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 6, '.', ''),
        );
    }

    public function filter(int $currentPage = 1, array $filters): LengthAwarePaginator
    {
        $result = DB::connection($this->connection)
            ->table($this->table)
            ->select($this->fillable);
        $result = $this->makeFilters($result, $filters);
        $result = $result->orderBy('id', 'DESC')
            ->get();

        $items = collect($result)
            ->skip(($currentPage - 1) * self::PER_PAGE)
            ->take(self::PER_PAGE)
            ->map(fn($item) => new self((array) $item));

        return new LengthAwarePaginator(
            $items,
            $result->count(),
            self::PER_PAGE,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]
        );
    }

    public function one(int $id): ?ControleTi
    {
        $result = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->first();

        return $result ? new self((array) $result) : null;
    }

    public function updateControleTi(int $id, array $data): bool
    {
        $updated = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->update($data);

        return $updated > 0;
    }

    // public function createControleTi(array $data): bool
    // {
    //     $id = DB::connection($this->connection)
    //         ->table($this->table)
    //         ->insertGetId($data);

    //     return $id > 0;
    // }

    // public function deleteControleTi(int $id): bool
    // {
    //     $deleted = DB::connection($this->connection)
    //         ->table($this->table)
    //         ->where('id', $id)
    //         ->delete();

    //     return $deleted > 0;
    // }
}
