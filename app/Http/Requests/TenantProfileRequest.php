<?php

namespace App\Http\Requests;

use App\Rules\TenantUnique;
use App\Tenant\ManagerTenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TenantProfileRequest extends FormRequest
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

        // dd(request()->all());
        $rules =  [
            'email' => ['required', 'string', 'email', 'min:3', 'max:255',  Rule::unique('pgsql.providers.tenants')->ignore(app(ManagerTenant::class)->getTenantIdentify())],
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('pgsql.providers.tenants')->ignore(app(ManagerTenant::class)->getTenantIdentify())],
            'cnpj' => ['required', 'numeric', 'digits:14', Rule::unique('pgsql.providers.tenants')->ignore(app(ManagerTenant::class)->getTenantIdentify())],
            // 'logo' => ['mimes:jpeg,jpg,png,', 'dimensions:min_width=128,min_height=128', 'dimensions:max_width=1024,max_height=1024',]
            'logo' => ['required|max:1024', 'image', 'dimensions:max_width=1024,max_height=1024']



        ];

        if ($this->method() == 'PUT') {
            $rules['logo'] = ['nullable', 'max:1024', 'image', 'dimensions:max_width=1024,max_height=1024'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            // 'logo' => [
            //     'dimensions' => [
            //         'max_width' => 'O :attribute não pode ter uma dimensão (largura) maior que :max_width px',
            //         'max_height' => 'O :attribute não pode ter uma dimensão (altura) maior que :max_height px',
            //     ]
            // ]
            'logo.dimensions' => 'A imagem possui dimenssões maiores que 1024x1024',
            'logo.max' => 'A imagem não pode ter mais de 1MB'
        ];
    }
}
