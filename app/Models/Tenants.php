<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenants extends Model
{
    use Blameable, SoftDeletes;

    protected $table = 'providers.tenants';
    protected $fillable = [
        'name',
        'cnpj',
        'url',
        'email',
        'logo',
        'active',
        'subscription_date',
        'expires_at',
        'subscription_active',
        'subscription_suspende',
        'lat',
        'lng',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $dates = ['created_at', 'updated_at', 
        'deleted_at', 'subscription_date', 'expires_at'];
}
