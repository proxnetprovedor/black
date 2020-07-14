<?php

namespace App\Http\Requests;

use App\Rules\CPF;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreUpdateCostumerRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $cpf_cnpj = preg_replace('/[^0-9]/', '', $request->cpf_cnpj);

        if ($request->type_person == 'pf' && strlen($cpf_cnpj) > 11) {
            return ['cpf_cnpj' => 'cpf'];
        } elseif ($request->type_person == 'pj' && strlen($cpf_cnpj) <= 14) {
            return ['cpf_cnpj' => 'cnpj'];
        }

        return [
            'img' => ['image', 'mimes:jpg,jpeg,png,bmp,tiff', 'max:50000'],
            'cpf_cnpj' => 'required|cpf_cnpj',
            'pay_day' => 'required',
            'cep' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'number' => ['required'],
            'neighborthood' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'insc_estadual' => $request->type_person == 'pj' ? 'required' : '',
            'insc_municipal' => $request->type_person == 'pj' ? 'required' : '',
        ];
    }


    public function messages()
    {
        return [
            'number.required' => 'O campo número é obrigatório.',
            'neighborthood.required' => 'O campo bairro é obrigatório.',
            'cpf_cnpj.required' => 'O campo CPF|CNPJ é obrigatório.',
            'pay_day.required' => 'O campo "Dia para Pagamento" é obrigatório.',
            'img.image' => 'O campo foto deve conter um arquivo do tipo imagem.',
            'img.mimes' => 'O campo foto deve conter um arquivo do tipo: jpg, jpeg, png, bmp, tiff.',
            'insc_estadual.required' => 'O campo "Inscrição Estadual" é obrigatório.',
            'insc_municipal.required' => 'O campo "Inscrição Municipal" é obrigatório.'
        ];
    }
}
