<?php

namespace App\Models\Glpi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class ControleTi extends Model
{
    const PER_PAGE = 30;

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
        'cronMoverJiraStatusGLPI',
        'cronIdUltimaMsgTI',
        'priority_order',
        'priority_number',
    ];

    protected $hidden = [
        'cronMoverJiraStatusGLPI',
        'cronIdUltimaMsgTI',
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
            'cronMoverJiraStatusGLPI' => 'datetime',
            'cronIdUltimaMsgTI' => 'integer',
            'priority_order' => 'integer',
            'priority_number' => 'decimal:14,6',
        ];
    }

    protected function dateCreation(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    protected function dateMod(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    public function paginated(int $currentPage = 1): LengthAwarePaginator
    {
        return DB::connection($this->connection)
            ->table($this->table)
            ->orderBy('id', 'desc')
            ->paginate(self::PER_PAGE, ['*'], 'page', $currentPage);
    }

    public function one(int $id): ?ControleTi
    {
        $result = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->first();

        return $result ? new self((array) $result) : null;
    }

    public function createControleTi(array $data): bool
    {
        $id = DB::connection($this->connection)
            ->table($this->table)
            ->insertGetId($data);

        return $id > 0;
    }

    public function updateControleTi(int $id, array $data): bool
    {
        $updated = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->update($data);

        return $updated > 0;
    }

    public function deleteControleTi(int $id): bool
    {
        $deleted = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->delete();

        return $deleted > 0;
    }
}
