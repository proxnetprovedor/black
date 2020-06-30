<div class="row col-md-12">
  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('cep', 'CEP', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('cep', isset($costumer) && $costumer->person->cpf_cnpj && !old('cep') != null ?
      $costumer->person->cpf_cnpj : old('cep') , ['class'=>'form-control mt-4', 'id'=>'cep']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('address', 'Endereço', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('address', isset($costumer) && $costumer->person->address->address && !old('address') != null ?
      $costumer->person->address->address : old('address') , ['class'=>'form-control mt-4', 'id'=>'address']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('number', 'Nº', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('number', isset($costumer) && $costumer->person->address->number && !old('number') != null ?
      $costumer->person->address->number : old('number') , ['class'=>'form-control mt-4', 'id'=>'number']) !!}
    </div>
  </div>
  <div class="col-md-5">
    <div class="form-group">
      {!! Form::label('complement', 'Complemento', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('complement', isset($costumer) && $costumer->person->address->complement && !old('complement') != null ?
      $costumer->person->address->complement : old('complement') , ['class'=>'form-control mt-4', 'id'=>'complement']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('condominium', 'Condominio', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('condominium', isset($costumer) && $costumer->person->address->condominium && !old('condominium') != null ?
      $costumer->person->address->complement : old('condominium') , ['class'=>'form-control mt-4', 'id'=>'condominium']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      {!! Form::label('block', 'Bloco', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('block', isset($costumer) && $costumer->person->address->block && !old('block') != null ?
      $costumer->person->address->block : old('block') , ['class'=>'form-control mt-4', 'id'=>'block']) !!}
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      {!! Form::label('apartment', 'Ap', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('apartment', isset($costumer) && $costumer->person->address->apartment && !old('apartment') != null ?
      $costumer->person->address->apartment : old('apartment') , ['class'=>'form-control mt-4', 'id'=>'apartment']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('neighborthood', 'Bairro', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('neighborthood', isset($costumer) && $costumer->person->address->neighborthood && !old('neighborthood') !=
      null ? $costumer->person->address->neighborthood : old('neighborthood') , ['class'=>'form-control mt-4',
      'id'=>'neighborthood']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('city', 'Cidade', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('city', isset($costumer) && $costumer->person->address->city && !old('city') != null ?
      $costumer->person->address->city : old('city') , ['class'=>'form-control mt-4', 'id'=>'city']) !!}
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      {!! Form::label('state', 'Estado', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('state', isset($costumer) && $costumer->person->address->state && !old('state') != null ?
      $costumer->person->address->state : old('state') , ['class'=>'form-control mt-4', 'id'=>'state']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('lat', 'Latitude', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('lat', isset($costumer) && $costumer->lat && !old('lat') != null ? $costumer->lat :
      old('lat') , ['class'=>'form-control mt-4', 'id'=>'lat']) !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('lng', 'Longitude', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('lng', isset($costumer) && $costumer->lng && !old('lng') != null ? $costumer->lng :
      old('lng') , ['class'=>'form-control mt-4', 'id'=>'lng']) !!}
    </div>
  </div>

</div>