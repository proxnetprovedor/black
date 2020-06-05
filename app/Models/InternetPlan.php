<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternetPlan extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'providers.internet_plans';
    
    protected $fillable = [
        'price',
        'download_rate',
        'upload_rate', 
        'is_ppoe',
        'is_hotpost',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
