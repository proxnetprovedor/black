
    <div class="row col-md-12" >
        <div class="form-group col-md-6">
            {!! Form::label('name', 'Nome da Empresa', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('name', isset($tenant) && $tenant->name && !old('name') != null ? $tenant->name  : old('name') , ['class'=>'form-control', 'id'=>'name']) !!}

        </div>
        <div class="form-group col-md-6">
          {!! Form::label('cnpj', 'CNPJ', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cnpj', isset($tenant) && $tenant->cnpj && !old('cnpj') != null ? $tenant->cnpj  : old('cnpj'), ['class'=>'form-control', 'id'=>'cnpj']) !!}
        </div>
        <div class="form-group col-md-6">
          
          {!! Form::label('url', 'URL', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('url', isset($tenant) && $tenant->url && !old('url') != null ? $tenant->url  : old('url'), ['class'=>'form-control', 'id'=>'url']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('email', 'E-mail', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::email('email', isset($tenant) && $tenant->email && !old('email') != null ? $tenant->email  : old('email'), ['class'=>'form-control', 'id'=>'email']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('subscription_date', 'Data de Inscrição', ['class'=> 'bmd-label']) !!}
          {!! Form::date('subscription_date', isset($tenant) && $tenant->subscription_date && !old('subscription_date') != null ? $tenant->subscription_date  : old('subscription_date'),['class'=>'form-control', 'id'=>'subscription_date']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('expires_at', 'Expira em', ['class'=> 'bmd-label']) !!}
          {!! Form::date('expires_at', isset($tenant) && $tenant->expires_at && !old('expires_at') != null ? $tenant->expires_at  : old('expires_at'),['class'=>'form-control', 'id'=>'expires_at']) !!}
        </div>
        {{-- <div class="form-group col-md-6">
          <label class="bmd-label-floating" for="subscription_date">Data de Inscrição</label>
          <input type="date" class="form-control datetimepicker" id="subscription_date" name="subscription_date">
          <span class="material-input"></span>
          <span class="material-input"></span>
        </div> --}}
        {{-- <div class="form-group col-md-6">
          <label class="bmd-label-floating" for="subscription_suspende">Data de Suspensão</label>
          <input type="text" class="form-control datetimepicker" id="subscription_suspende" name="subscription_suspende">
          <span class="material-input"></span>
          <span class="material-input"></span>
        </div> --}}
        <div class="form-group col-md-4">
          {!! Form::label('cep', 'CEP', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cep', isset($address) && $address->cep && !old('cep') != null ? $address->cep  : old('cep'), ['class'=>'form-control', 'id'=>'cep']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('address', 'Endereço', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('address', isset($address) && $address->address && !old('address') != null ? $address->address  : old('address'), ['class'=>'form-control', 'id'=>'address']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('number', 'Nº', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('number', isset($address) && $address->number && !old('number') != null ? $address->number  : old('number'), ['class'=>'form-control', 'id'=>'number']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('neighborthood', 'Bairro', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('neighborthood', isset($address) && $address->neighborthood && !old('neighborthood') != null ? $address->neighborthood  : old('neighborthood'), ['class'=>'form-control', 'id'=>'neighborthood']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('city', 'Cidade', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('city', isset($address) && $address->city && !old('city') != null ? $address->city  : old('city'), ['class'=>'form-control', 'id'=>'city']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('state', 'UF', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('state', isset($address) && $address->state && !old('state') != null ? $address->state  : old('state'), ['class'=>'form-control', 'id'=>'state']) !!}
        </div>
        
        {{-- @include('admin.tenants.partials._form_address', ['address'=>$tenant->address()[0]]) --}}
    </div>