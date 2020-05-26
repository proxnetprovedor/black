<?php

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costumer extends Model
{
    use Blameable, SoftDeletes;

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
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
