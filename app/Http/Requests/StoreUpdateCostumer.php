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
            'img' => ['image', 'mimetypes:jpg,png','max.file:50000'],
            'cpf_cnpj' => ['required', 'max:18', new CPF()],
            'documento' => ['required'],
            'name' => ['required'],
            'birth' => ['required'],
            'address' => ['required'],
            'number' => ['required'],
            'neighborthood' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'insc_estadual' => ['required'],
            'insc_municipal' => ['required'],
        ];
    }
}
