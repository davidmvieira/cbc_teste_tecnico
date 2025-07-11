<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubeRequest extends FormRequest
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
            'clube' => ['required|string'],
            'saldo_disponivel' => ['required', 'regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/'],
        ];

    }
    public function messages(): array
    {
        return [
            'clube.required' => 'O campo clube é obrigatório.',
            'clube.string' => 'O campo clube deve ser uma string.',
            'saldo_disponivel.required' => 'O campo saldo disponível é obrigatório.',
            'saldo_disponivel.regex' => 'O saldo disponível deve ser um número válido com até duas casas decimais.',
        ];
    }
}
