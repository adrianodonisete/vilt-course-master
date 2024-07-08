<?php

namespace App\Http\Requests\Produtos;

use Illuminate\Foundation\Http\FormRequest;

class EanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ean' => 'required|numeric|min_digits:13|max_digits:14',
            'active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'ean' => 'O campo EAN é obrigatório. Somente números. Mínino 13 e máximo 14 dígitos',
            'active' => 'O campo Ativo tem que ser boleano',
        ];
    }
}
