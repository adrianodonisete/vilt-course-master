<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  use HasFactory;

  protected $fillable = [
    'beds', 'baths', 'area',
    'city', 'code', 'street', 'street_nr',
    'price',
  ];

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
