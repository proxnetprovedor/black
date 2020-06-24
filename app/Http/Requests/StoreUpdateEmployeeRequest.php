<?php

namespace App\Http\Requests;

use App\Rules\CPF;
use App\Rules\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'cpf_cnpj' => ['required', 'max:18', new CPF()],
            'salary' => ['required', 'numeric',],
            'working_hours' => ['required', 'numeric'],
            'function' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', new TenantUnique('users')],
            'password' => ['required', 'string', 'min:6', 'max:16', 'confirmed'],

            'cep' => ['required'],
            'neighborthood' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'number' => ['required', 'string', 'max:9'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],

        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'O campo número é obrigatório',
            'neighborthood.required' => 'O campo bairro é obrigatório',
            'salary.required' => 'O campo salário é obrigatório',
            'function.required' => 'O campo função é obrigatório',
            'working_hours.required' => 'O campo carga horária é obrigatório',
            'cpf_cnpj.required' => 'O campo CPF é obrigatório',
        ];
    }
}
