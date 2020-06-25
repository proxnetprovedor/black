<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| PersonService
|--------------------------------------------------------------------------
|
| Classe responsável por persistir, relacionar e retorna as entidades
| correspondentes a Person    
|
*/

class PersonService
{

    public function store($attributes)
    {

        $person = Person::create($attributes);

        $attributes['addressable_type'] = Person::class;
        $attributes['addressable_id'] = $person->id;
        
        $address = Address::create($attributes);

        return $person;
    }


}
