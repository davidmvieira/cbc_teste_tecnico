<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumoRequest extends FormRequest
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
            'clube_id' => 'required|exists:clubes,id',
            'recurso_id' => 'required|exists:recursos,id',
            'valor_consumo' => 'required', 'regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/'
        ];
    }
    public function messages(): array
    {
        return [
            'clube_id.required' => 'O campo clube é obrigatório.',
            'clube_id.exists' => 'O clube selecionado não existe.',
            'recurso_id.required' => 'O campo recurso é obrigatório.',
            'recurso_id.exists' => 'O recurso selecionado não existe.',
            'valor_consumo.required' => 'O campo valor de consumo é obrigatório.',
            'valor_consumo.regex' => 'O valor de consumo deve ser um número válido com até duas casas decimais.',
        ];
    }

}
