<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait Blameable
{

    public static function bootBlameable() {
        
        if(Auth::check()){
            static::creating(function($model) {
                //dd(array_key_exists('created_by', $model->attributes));
                if(!array_key_exists('created_by', $model->attributes)){
                    
                    $model->created_by = Auth::id();
                   
                }
                if(array_key_exists('updated_by', $model->attributes)){
                    dd(Auth::id());
                    $model->updated_by = Auth::id();
                }
            });

            static::updating(function($model)  {
                if(array_key_exists('updated_by', $model->attributes)){
                    $model->updated_by = Auth::id();
                }                
            });

            static::deleting(function($model)  {
                if(array_key_exists('deleted_by', $model->attributes)){
                    $model->deleted_by = Auth::id();
                }                
            });
        }
    }
    //Usuário criador da model
    public  function createdBy() {
        dd(Auth::id());
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');    
    }

    public function deletedBy() {
        return $this->belongsTo(User::class, 'deleted_by');    
    }
}
