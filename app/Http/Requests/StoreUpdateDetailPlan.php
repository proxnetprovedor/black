<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDetailPlan extends FormRequest
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
            'name' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome',
            'name.min' => 'O nome deve conter ao menos 3 caracteres',
            'name.max' => 'O nome deve conter no máximo 255 caracteres',
        ];
    }
}
