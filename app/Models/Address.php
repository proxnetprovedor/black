<?php

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use Blameable, SoftDeletes;

    protected $table = 'addresses';
    protected $fillable = [
        'lat',
        'lng',
        'cep',
        'neighborthood',
        'address',
        'number',
        'state',
        'city',
        'complement',
        'condominium',
        'block',
        'apartment',
        'addressable_id',
        'addressable_type',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}

