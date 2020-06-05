<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use Blameable, SoftDeletes, UuidTrait, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

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
}