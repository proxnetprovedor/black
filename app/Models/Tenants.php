<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenants extends Model
{
    use Blameable, SoftDeletes, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'string';

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
    protected $dates = [
        'created_at', 'updated_at',
        'deleted_at', 'subscription_date', 'expires_at'
    ];


    public function address() {
        $address = Address::where('addressable_type', 'App\Models\Tenants')->where('addressable_id', $this->id)->get();
        return $address;
    }
}
