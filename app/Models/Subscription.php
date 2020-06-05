<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use Blameable, SoftDeletes, UuidTrait, TenantTrait;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'subscription.subscriptions';

    protected $fillable = [
        'auto_block',
        'pay_day',
        'pay_discount',
        'pay_exta',
        'has_to_pay',
        'days_to_block',
        'auth_type',
        'login',
        'password',
        'ip_address',
        'mac_address',
        'contract_id',
        'instalation_id',
        'server_id',
        'costumer_id',
        'employee_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
        'internet_plan_id',
        'address_charge_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'pay_day'
    ];
}
