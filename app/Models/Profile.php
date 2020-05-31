<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use UuidTrait;

    public $table = 'acl_plans.profiles';

    public $incrementing = false;

    protected $keyType = 'string';

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