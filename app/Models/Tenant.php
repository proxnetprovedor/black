<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use Blameable, SoftDeletes;
    use UuidTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'providers.tenants';

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
        'plan_id'
    ];
    protected $dates = [
        'created_at', 'updated_at',
        'deleted_at', 'subscription_date', 'expires_at'
    ];

    protected $with = ['servers'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address() {
        $address = Address::where('addressable_type', 'App\Models\Tenants')->where('addressable_id', $this->id)->get();
        return $address;
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
    public function ctos()
    {
        return $this->hasMany(Ctos::class);
    }
    public function instalations()
    {
        return $this->hasMany(Instalation::class);
    }
}
