<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends BaseModel
{
    use Blameable, SoftDeletes;

    protected $table = 'subscription.contracts';
    
    protected $fillable = [
        'person_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}

