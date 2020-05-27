<?php

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccesPoint extends Model
{
    use Blameable, SoftDeletes, TenantTrait, UuidTrait;


    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'providers.acces_points';
    
    protected $fillable = [
        'name',
        'description',
        
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    
}

