<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    protected $table = 'providers.employees';
    
    protected $fillable = [
        'name',
        'function',
        'working_hours',
        'salary',
        'person_id',
        'user_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
