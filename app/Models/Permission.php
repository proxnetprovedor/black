<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Permission as ModelPermission;
use App\Traits\UuidTrait;

class Permission extends Model
{
    use UuidTrait;
    
    protected $table = 'acl_plans.permissions';

    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = 'string';

     /**
     * Get Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class,  'acl_plans.permission_profile');
    }

    /**
     * Get Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,  'acl_plans.permission_roles');
    }

}
