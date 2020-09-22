<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{

    // protected $primaryKey = '';

    public $incrementing = false;

    protected $keyType = 'string';



    /**
     *  Setup model event hooks
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id =  Uuid::uuid4()->toString();
        });
    }

    /**
     * Retona as regras de validacao da model
     */
    public function getValidationRules()
    {
        return [];
    }

    /**
     * Retorna as msgs de validacao da model
     */
    public function getValitionMessages()
    {
        return [];
    }
}
