<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPlan;
use App\Traits\UuidTrait;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use Blameable, SoftDeletes, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'acl_plans.plans';

    protected $fillable = [
        'name', 'url', 'price', 'description',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
