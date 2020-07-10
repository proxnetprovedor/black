<div class="row col-md-12">
  <div class="col-md-3">
    <div class="form-group">
      <label for="cep" class="bmd-label-floating">
        CEP
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('cep', isset($costumer) && $costumer->person->address->cep && !old('cep') != null ? $costumer->person->address->cep : old('cep') , ['class'=>'form-control mt-4', 'id'=>'cep']) !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="address" class="bmd-label-floating">
        Endereço
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('address', isset($costumer) && $costumer->person->address->address && !old('address') != null ?
      $costumer->person->address->address : old('address') , ['class'=>'form-control mt-4', 'id'=>'addressField']) !!}
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="number" class="bmd-label-floating">
        Nº
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('number', isset($costumer) && $costumer->person->address->number && !old('number') != null ?
      $costumer->person->address->number : old('number') , ['class'=>'form-control mt-4', 'id'=>'number']) !!}
    </div>
  </div>

  <div class="col-md-5">
    <div class="form-group">
      {!! Form::label('complement', 'Complemento', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('complement', isset($costumer) && $costumer->person->address->complement && !old('complement') !=
      null ? $costumer->person->address->complement : old('complement'),
      ['class'=>'form-control mt-4', 'id'=>'complement'])
      !!}
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('condominium', 'Condominio', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('condominium', isset($costumer) && $costumer->person->address->condominium && !old('condominium')
      != null ? $costumer->person->address->condominium : old('condominium') , ['class'=>'form-control mt-4',
      'id'=>'condominium'])
      !!}
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
      {!! Form::text('apartment', isset($costumer) && $costumer->person->address->apartment && !old('apartment') !=
      null ? $costumer->person->address->apartment : old('apartment') , ['class'=>'form-control mt-4',
      'id'=>'apartment'])
      !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="neighborthood" class="bmd-label-floating">
        Bairro
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('neighborthood', isset($costumer) && $costumer->person->address->neighborthood &&
      !old('neighborthood') != null ? $costumer->person->address->neighborthood : old('neighborthood') ,
      ['class'=>'form-control mt-4', 'id'=>'neighborthood'])
      !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="city" class="bmd-label-floating">
        Cidade
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('city', isset($costumer) && $costumer->person->address->city && !old('city') != null ?
       $costumer->person->address->city : old('city'), ['class'=>'form-control mt-4', 'id'=>'city'])
      !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="state" class="bmd-label-floating">
        Estado
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('state', isset($costumer) && $costumer->person->address->state && !old('state') != null ?
      $costumer->person->address->state : old('state'), ['class'=>'form-control mt-4', 'id'=>'state']) !!}
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


<script>
  const cep = document.getElementById('cep');

  cep.addEventListener('blur', loadCep);

  function loadCep(){
      fetch('https://viacep.com.br/ws/'+cep.value+'/json/unicode/')
      .then(function (response) {
          return response.json();
      })
      .then(function (data) {
          document.getElementById('addressField').value = data.logradouro;
          document.getElementById('state').value = data.uf;
          document.getElementById('city').value = data.localidade;
          document.getElementById('neighborthood').value = data.bairro;
      })
      .catch(function (err) {
          console.log(err);
      });
  }

</script>