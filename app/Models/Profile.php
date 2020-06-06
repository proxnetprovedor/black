<?php

namespace App\Models;


class Profile extends BaseModel
{

    public $table = 'acl_plans.profiles';

    protected $guarded = [];



    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'acl_plans.permission_profile');
    }

    /**
     * Get Plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'acl_plans.profile_plan');
    }
}
