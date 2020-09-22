<form method="#" action="#">
    <div class="row col-md-10" >
        <div class="form-group col-md-6">
            {!! Form::label('nome_fantasia', 'Nome Fantasia', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('nome_fantasia', '', ['class'=>'form-control', 'id'=>'nome_fantasia']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('cnpj', 'CNPJ', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cnpj', '', ['class'=>'form-control', 'id'=>'cnpj']) !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('company_address_cep', 'CEP', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_cep', '', ['class'=>'form-control', 'id'=>'company_address_cep']) !!}
      </div>
      <div class="form-group col-md-6">
        {!! Form::label('company_address_street', 'Logradouro', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_street', '', ['class'=>'form-control', 'id'=>'company_address_street']) !!}
      </div>
      <div class="form-group col-md-2">
        {!! Form::label('company_address_number', 'Nº', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_number', '', ['class'=>'form-control', 'id'=>'company_address_number']) !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('company_address_district', 'Bairro', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_district', '', ['class'=>'form-control', 'id'=>'company_address_district']) !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('company_address_city', 'Cidade', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_city', '', ['class'=>'form-control', 'id'=>'company_address_city']) !!}
      </div>
      <div class="form-group col-md-2">
        {!! Form::label('company_address_state', 'Cidade', ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('company_address_state', '', ['class'=>'form-control', 'id'=>'company_address_state']) !!}
      </div>
    </div>
    
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value=""> Subscribe to newsletter
        <span class="form-check-sign">
          <span class="check"></span>
        </span>
      </label>
    </div>
  </form>