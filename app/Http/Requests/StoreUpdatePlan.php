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
               $this->method() == 'PUT' ? "unique:plans,name,{$this->plan->id}"  : 'unique:plans,name'
            ],
             
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
