<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidTrait
{

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     *  Setup model event hooks
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // dd($model);
            $model->{$model->getKeyName()} =  Uuid::uuid4()->toString();
        });
    }
}
