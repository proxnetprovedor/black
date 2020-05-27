<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelPermission;
use App\Traits\UuidTrait;

class Permission extends ModelPermission
{
    use UuidTrait;
    
    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = 'string';

}
