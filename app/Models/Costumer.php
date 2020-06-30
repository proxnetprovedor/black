<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costumer extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'subscription.costumers';
    
    protected $fillable = [
        'name',
        'phone',
        'email',
        'birth',
        'lat',
        'lng',
        'civil_state',
        'description',
        'pay_day',
        'person_id',
        
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['birth', 'created_at', 'updated_at', 'deleted_at',];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function addresses()
    {
        return $this->hasManyThrough(Address::class, Costumer::class);
    }
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
