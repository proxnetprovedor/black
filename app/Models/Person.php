_<?php
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use Blameable, SoftDeletes;

    protected $table = 'people';
    protected $fillable = [
        'cpf_cnpj',
        'documento',
        'insc_estadual', 
        'insc_municipal',
        'created_by',
        'updated_by',
        'deleted_by',
        'tenant_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];
}