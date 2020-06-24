
    <div class="row col-md-12" >
      <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('cep', 'CEP', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('cep', isset($costumer) && $costumer->address->cep && !old('cep') != null ? $costumer->person->cpf_cnpj  : old('cep') , ['class'=>'form-control', 'id'=>'cep']) !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('address', 'Endereço', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('address', isset($costumer) && $costumer->address->address && !old('address') != null ? $costumer->address->address  : old('address') , ['class'=>'form-control', 'id'=>'address']) !!}
      </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          {!! Form::label('number', 'Nº', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('number', isset($costumer) && $costumer->address->number && !old('number') != null ? $costumer->address->number  : old('number') , ['class'=>'form-control', 'id'=>'number']) !!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('complement', 'Complemento', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('complement', isset($costumer) && $costumer->address->complement && !old('complement') != null ? $costumer->address->complement  : old('complement') , ['class'=>'form-control', 'id'=>'complement']) !!}
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('condominium', 'Condominio', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('condominium', isset($costumer) && $costumer->address->condominium && !old('condominium') != null ? $costumer->address->complement  : old('condominium') , ['class'=>'form-control', 'id'=>'condominium']) !!}
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('block', 'Bloco', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('block', isset($costumer) && $costumer->address->block && !old('block') != null ? $costumer->address->block  : old('block') , ['class'=>'form-control', 'id'=>'block']) !!}
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('apartment', 'Ap', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('apartment', isset($costumer) && $costumer->address->apartment && !old('apartment') != null ? $costumer->address->apartment  : old('apartment') , ['class'=>'form-control', 'id'=>'apartment']) !!}
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          {!! Form::label('neighborthood', 'Bairro', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('neighborthood', isset($costumer) && $costumer->address->neighborthood && !old('neighborthood') != null ? $costumer->address->neighborthood  : old('neighborthood') , ['class'=>'form-control', 'id'=>'neighborthood']) !!}
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          {!! Form::label('city', 'Cidade', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('city', isset($costumer) && $costumer->address->city && !old('city') != null ? $costumer->address->city  : old('city') , ['class'=>'form-control', 'id'=>'city']) !!}
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          {!! Form::label('state', 'UF', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('state', isset($costumer) && $costumer->address->state && !old('state') != null ? $costumer->address->state  : old('state') , ['class'=>'form-control', 'id'=>'state']) !!}
        </div>
      </div>
    </div>