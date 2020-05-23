<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPlan;
use App\Traits\UuidTrait;

class Plan extends Model
{

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }
}
