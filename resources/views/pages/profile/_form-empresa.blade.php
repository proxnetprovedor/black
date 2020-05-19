<form method="#" action="#">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('nome_fantasia', 'Nome Fantasia', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('nome_fantasia', '', ['class'=>'form-control', 'id'=>'nome_fantasia']) !!}
        </div>
        <div class="form-group col-md-6">
          <label for="examplePass" class="bmd-label-floating">Password</label>
          <input type="password" class="form-control" id="examplePass">
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