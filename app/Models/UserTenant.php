<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserTenant extends Pivot
{
    protected $table = 'user_tenants';
    protected $fillable = [
        'user_id',
        'tenant_id',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
