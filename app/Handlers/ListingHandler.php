<?php

namespace App\Handlers;

class ListingHandler
{
    public static function validateRules(): array
    {
        return [
            'beds' => 'required|integer|min:1|max:20',
            'baths' => 'required|integer|min:1|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:5000',
            'price' => 'required|integer|min:300|max:20000000',
        ];
    }
}
