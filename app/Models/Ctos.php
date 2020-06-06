<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctos extends BaseModel
{
    use Blameable;
    use SoftDeletes;
    use TenantTrait;


    protected $table = 'providers.ctos';
    
    protected $fillable = [
        'name',
        'number',
        'capacity',
        'lat',
        'lng',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];

    
}
