<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    protected $table = 'providers.servers';
    
    protected $fillable = [
        'name',
        'ip_address',
        'port',
        'login',
        'password',
        'interface',
        'image',
        'lat',
        'lng',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    //protected $with = ['internetPlans'];
    public function internetPlans()
    {
        return $this->belongsToMany(InternetPlan::class, 'providers.internet_plan_servers');
    }
}
