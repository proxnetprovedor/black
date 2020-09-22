
    <div class="row col-md-12" >
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('name', 'Nome do Servidor', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('name', isset($cto) && $cto->name && !old('name') != null ? $cto->name  : old('name') , ['class'=>'form-control', 'id'=>'name']) !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('number', 'Numero', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('number', isset($cto) && $cto->name && !old('number') != null ? $cto->number  : old('number') , ['class'=>'form-control', 'id'=>'number']) !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('capacity', 'Capacidade', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('capacity', isset($cto) && $cto->capacity && !old('capacity') != null ? $cto->capacity  : old('capacity') , ['class'=>'form-control', 'id'=>'capacity']) !!}
        </div>
      </div>
    </div>