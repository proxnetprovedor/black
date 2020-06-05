<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternetPlanServer extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'providers.internet_plan_servers';
    
    protected $fillable = [
        'server_id',
        'internet_plan_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
