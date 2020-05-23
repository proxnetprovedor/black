<form method="#" action="#" class="">
    <div class="row col-md-12" >
        <div class="form-group col-md-3">
          <select class="selectpicker col-md-12" data-size="7" data-style="btn btn-primary" title="Single Select" id="api">
            <option disabled selected>Single Option</option>
            <option value="2">Foobar</option>
            <option value="3">Is great</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          {!! Form::label('cliente_id', 'GERÊNCIA NET CLIENT ID', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cliente_id', '', ['class'=>'form-control', 'id'=>'cliente_id']) !!}
        </div>
        <div class="form-group col-md-5">
          {!! Form::label('secret', 'GERÊNCIA NET CLIENT SECRET', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cliente_id', '', ['class'=>'form-control', 'id'=>'secret']) !!}
        </div>
        <div class="form-group col-md-12">
          {!! Form::label('token', 'BOLETO FÁCIL TOKEN', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('cliente_id', '', ['class'=>'form-control', 'id'=>'token']) !!}
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