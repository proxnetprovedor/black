<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPlan;
use App\Traits\UuidTrait;

class Plan extends Model
{
    use Blameable, SoftDeletes;

    protected $fillable = ['name', 'url', 'price', 'description',
            'updated_by',
            'deleted_by',
        ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }
}