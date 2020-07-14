<?php

namespace App\Models;

use App\Models\DetailPlan;
use App\Observers\PlanObserver;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends BaseModel
{
    use Blameable, SoftDeletes;

    protected $table = 'acl_plans.plans';

    protected $fillable = [
        'name', 'url', 'price', 'description',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();


        static::observe(PlanObserver::class);
    }
    // public function providers()
    // {
    //     return $this->
    // }

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'acl_plans.profile_plan');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
