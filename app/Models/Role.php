<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Spatie\Permission\Models\Role as ModelRole;

class Role extends ModelRole
{
    use UuidTrait;

    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = 'string';

}
