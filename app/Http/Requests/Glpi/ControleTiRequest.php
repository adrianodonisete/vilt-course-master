<?php

namespace App\Http\Requests\Glpi;

use Illuminate\Foundation\Http\FormRequest;

class ControleTiRequest extends FormRequest
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
            'proj' => 'nullable|string|max:10',
            'jira' => 'nullable|string|max:100',
            'priority_order' => 'nullable|integer',
            'priority_number' => 'nullable|decimal:1,6',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'proj.max' => 'O campo projeto não pode ter mais que 100 caracteres.',
            'jira.max' => 'O campo JIRA não pode ter mais que 100 caracteres.',
            'priority_order.integer' => 'O campo ordem de prioridade deve ser um número inteiro.',
            'priority_number.decimal' => 'O campo número de prioridade deve ser um decimal com até 6 casas decimais.',
        ];
    }
}
