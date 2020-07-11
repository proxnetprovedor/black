<?php

namespace App\Http\Requests;

use App\Rules\CPF;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCostumer extends FormRequest
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
            'img' => ['image', 'mimes:jpg,jpeg,png,bmp,tiff','max:50000'],
            'cpf_cnpj' => ['required', 'max:18', new CPF()],
            'cep' => ['required'],
            //'documento' => ['required'],
            'name' => ['required'],
            //'birth' => ['required'],
            'address' => ['required'],
            'number' => ['required'],
            'neighborthood' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            //'insc_estadual' => ['required'],
            //'insc_municipal' => ['required'],
        ];
    }


    public function messages()
    {
        return [
            'number.required' => 'O campo número é obrigatório.',
            'neighborthood.required' => 'O campo bairro é obrigatório.',
            'cpf_cnpj.required' => 'O campo CPF|CNPJ é obrigatório.',
            'img.image' => 'O campo foto deve conter um arquivo do tipo imagem.',
            'img.mimes' => 'O campo foto deve conter um arquivo do tipo: jpg, jpeg, png, bmp, tiff.',
        ];
    }
}
