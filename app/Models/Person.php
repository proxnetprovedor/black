<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;


    protected $table = 'people';

    protected $fillable = [
        'cpf_cnpj',
        'documento',
        'insc_estadual',
        'insc_municipal',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];

    /**
     * Uma pessoa pode ter um endereço
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    public function costumer()
    {
        return $this->hasOne(Costumer::class);
    }
}
