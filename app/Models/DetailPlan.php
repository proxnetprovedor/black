<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPlan extends Model
{
    use Blameable, SoftDeletes;
    protected $table = 'acl_plans.plans';

    protected $fillable = ['name','created_by', 'updated_by', 'deleted_by'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function plan()
    {
        $this->belongsTo(Plan::class);
    }
}

