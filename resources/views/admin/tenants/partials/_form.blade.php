
    <div class="row col-md-12" >
        <div class="form-group col-md-6">
            {!! Form::label('name', 'Nome da Empresa', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('name', '', ['class'=>'form-control', 'id'=>'name']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('cnpj', 'CNPJ', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cnpj', '', ['class'=>'form-control', 'id'=>'cnpj']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('url', 'URL', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('url', '', ['class'=>'form-control', 'id'=>'url']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('email', 'E-mail', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::email('email', '', ['class'=>'form-control', 'id'=>'email']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('subscription_date', 'Data de Inscrição', ['class'=> 'bmd-label']) !!}
          {!! Form::date('subscription_date', '',['class'=>'form-control', 'id'=>'subscription_date']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('expires_at', 'Expira em', ['class'=> 'bmd-label']) !!}
          {!! Form::date('expires_at', '',['class'=>'form-control', 'id'=>'expires_at']) !!}
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
        @include('admin.tenants.partials._form_address')
    </div>