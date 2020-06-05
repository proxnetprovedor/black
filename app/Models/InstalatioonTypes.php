<?php

use App\Models\BaseModel;
use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstalatioonTypes extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    protected $table = 'providers.instalation_types';
    protected $fillable = [
        'name',
        'description',

        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}