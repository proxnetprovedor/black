<div class="row col-md-12">
  <div class="col-md-5">
    <div class="form-group">
      <select class="form-control selectpicker" data-style="btn btn-link">
        <option disabled selected>Tipo de Pessoa</option>
        <option>Pessoa Física</option>
        <option>Pessoa Jurídica</option>
      </select>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('cpf_cnpj', 'CPF | CNPJ', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('cpf_cnpj', isset($costumer) && $costumer->person->cpf_cnpj && !old('cpf_cnpj') != null ?
      $costumer->person->cpf_cnpj : old('cpf_cnpj') , ['class'=>'form-control', 'id'=>'cpf_cnpj']) !!}
    </div>
  </div>

  <div class="col-md-8">
    <div class="form-group">
      {!! Form::label('name', 'Nome', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('name', isset($costumer) && $costumer->name && !old('name') != null ? $costumer->name : old('name')
      , ['class'=>'form-control', 'id'=>'name']) !!}
    </div>
  </div>

  <div class="col-md-4">
    {{-- <div class="form-group">
      {!! Form::label('birth', 'Nascimento', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::date('birth', isset($costumer) && $costumer->birth && !old('birth') != null ? $costumer->birth :
      old('birth') , ['class'=>'form-control', 'id'=>'birth']) !!}
    </div> --}}

    <div class="form-group">
      <label class="label-control">Data de Nascimento</label>
      <input type="text" class="form-control datetimepicker" value="21/06/2018" />
    </div>

  </div>

  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('email', 'E-mail', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::email('email', isset($costumer) && $costumer->email && !old('email') != null ? $costumer->email :
      old('email') , ['class'=>'form-control', 'id'=>'email']) !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('phone', 'Telefone', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('phone', isset($costumer) && $costumer->phone && !old('phone') != null ? $costumer->phone :
      old('phone') , ['class'=>'form-control', 'id'=>'phone']) !!}
    </div>
  </div>

  <div class="col-md-5">
    <div class="form-group">
      <select class="form-control" title="Single Select" name="civil_state" id="civil_state">
        <option class="form-control" disabled selected>Estado Civil</option>
        <option class="form-control" value="2">Solteiro(a)</option>
        <option class="form-control" value="3">Casado(a)</option>
        <option class="form-control" value="3">Viuvo(a)</option>
        <option class="form-control" value="3">Divorciado(a)</option>
        <option class="form-control" value="3">Separado(a)</option>
      </select>
    </div>
  </div>
</div>