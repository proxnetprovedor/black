<?php

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctos extends Model
{
    use Blameable, SoftDeletes;

    protected $table = 'providers.ctos';
    protected $fillable = [
        'name',
        'number',
        'capacity',
        'lat',
        'lng',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}
