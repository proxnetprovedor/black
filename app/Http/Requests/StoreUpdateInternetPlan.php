<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateInternetPlan extends FormRequest
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
            'name' => [
                "required",
               "min:3",
               "max:255|",
            //    $this->method() == 'PUT' ? "unique:internetPlans,name,{$this->internetPlan->id}"  : 'unique:internetPlans,name'
            ],
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'download_rate' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'upload_rate' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Informe o nome',
            'name.min' => 'O nome deve conter ao menos 3 caracteres',
            'name.max' => 'O nome deve conter no máximo 255 caracteres',
            'price.required' => 'Informe o valor do plano',
        ];
    }
}
