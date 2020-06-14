<?php

namespace App\Rules;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TenantUnique implements Rule
{
    private $table, $collumnValue, $column;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $collumnValue = null, $column = 'id')
    {
        $this->table = $table;
        $this->column = $column;
        $this->collumnValue = $collumnValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tenant_id = app(ManagerTenant::class)->getTenantIdentify();

        $is_valid = DB::table($this->table)
            ->where($attribute, $value)
            ->where('tenant_id', $tenant_id)
            ->first();

        if($is_valid && $is_valid->{$this->column} == $this->collumnValue)
            return true;


            dd($is_valid);
        // se for NULL retorna TRUE
        return is_null($is_valid);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O :attribute ja foi cadastrado em nossos bancos de dados';
    }
}
