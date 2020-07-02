<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

// use Spatie\Permission\Models\Role as ModelRole;

class Role extends Model
{
    use UuidTrait;

    protected $table = 'acl_plans.roles';

    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = 'string';


    const ADMIN = 'Administrador';

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,  'acl_plans.permission_role');
    }

    /**
     * Get Users
     */
    public function users()
    {
        return $this->belongsToMany(User::class,  'acl_plans.role_user');
    }


   
}
