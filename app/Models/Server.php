<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use Blameable, SoftDeletes, UuidTrait, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

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
}
