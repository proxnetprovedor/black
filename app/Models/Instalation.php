<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instalation extends BaseModel
{
    use Blameable, SoftDeletes, TenantTrait;

    protected $table = 'providers.instalations';
    protected $fillable = [
        'ssid',
        'password',
        'radio_ip',
        'onu_olt_model',
        'onu_serial',
        'onu_ip',
        'onu_mac',
        'caixa_switch',
        'switch_porta',
        'pppoe_port',
        //'vlan_id',
        'access_point_id',
        'instalation_type_id',
        'cto_id',

        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
