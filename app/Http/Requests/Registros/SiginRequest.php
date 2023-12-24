<?php

namespace App\Http\Requests\Registros;

use Illuminate\Foundation\Http\FormRequest;

class SiginRequest extends FormRequest
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
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|unique:users,email',
            'endereco' => 'required',
            'cpf' => 'required|unique:users,cpf|string|min:11|max:11',
            'password' => 'required|min:6|max:15'
        ];
    }
}
