<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use Blameable, SoftDeletes, TenantTrait;

    protected $table = 'providers.employees';
    protected $fillable = [
        'name',
        'function',
        'working_hours',
        'salary',
        'plan_id',
        'person_id',
        'user_id',


        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
