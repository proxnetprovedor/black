<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePlan extends FormRequest
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
        // unique:plans,name,{$this->method() == 'PUT' ? $this->plan->id : ''}"],
        $url = $this->segment(3);
        return [
            'name' => [
                "required",
               "min:3",
               "max:255|",
               $this->method() == 'PUT' ? "unique:pgsql.acl_plans.plans,name,{$this->plan->id}"  : 'unique:pgsql.acl_plans.plans,name'
            ],
            'url' => [
                "required",
               "min:3",
               "max:255|",
               $this->method() == 'PUT' ? "unique:pgsql.acl_plans.plans,url,{$this->plan->id}"  : 'unique:pgsql.acl_plans.plans,url'
            ],
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome',
            'name.min' => 'O nome deve conter ao menos 3 caracteres',
            'name.max' => 'O nome deve conter no máximo 255 caracteres',
            'description.min' => 'A descrição deve conter ao menos 3 caracteres',
            'description.max' => 'A descrição deve conter no máximo 255 caracteres',
            'price.required' => 'Informe o valor do plano',
        ];
    }
}
