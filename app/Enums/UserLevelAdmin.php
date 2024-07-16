<?php

namespace App\Enums;

enum UserLevelAdmin: string
{
    case OPTION_0 = 'Sem Permissão';
    case OPTION_20 = 'Consultar Regras';
    case OPTION_25 = 'Consultar Regras Especiais';
    case OPTION_30 = 'Inserir/Alterar Regras';
    case OPTION_40 = 'Inserir/Alterar Produtos (Admin Produtos)';
    case OPTION_45 = 'Inserir/Alterar Regras Especiais';
    case OPTION_50 = 'Admin Systax';
    case OPTION_55 = 'Admin Systax Regras Especiais';
    case OPTION_60 = 'Admin Produtos';

    public static function label(int $level): string|NULL
    {
        $cases = self::cases();
        $index = array_search("OPTION_{$level}", array_column($cases, 'name'));
        return $index !== false ? $cases[$index]->value : null;
    }

    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $key = intval(str_replace('OPTION_', '', $case->name));
            $array[$key] = $case->value;
        }
        return $array;
    }
}
