
    <div class="row col-md-12" >
        <div class="form-group col-md-12">
            {!! Form::label('name', 'Nome do Servidor', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('name', isset($server) && $server->name && !old('name') != null ? $server->name  : old('name') , ['class'=>'form-control', 'id'=>'name']) !!}
        </div>
        <div class="form-group col-md-8">
          {!! Form::label('ip_address', 'IP', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('ip_address', isset($server) && $server->ip_address && !old('ip_address') != null ? $server->ip_address  : old('ip_address'), ['class'=>'form-control', 'id'=>'ip_address']) !!}
        </div>
        <div class="form-group col-md-4">
          {!! Form::label('port', 'Porta', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('port', isset($server) && $server->port && !old('port') != null ? $server->port  : old('port'), ['class'=>'form-control', 'id'=>'port']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('login', 'Login', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('login', isset($server) && $server->login && !old('login') != null ? $server->login  : old('login'), ['class'=>'form-control', 'id'=>'login']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('password', 'Password', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('password', isset($server) && $server->password && !old('password') != null ? $server->password  : old('password'), ['class'=>'form-control', 'id'=>'password']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('interface', 'Interface', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('interface', isset($server) && $server->interface && !old('interface') != null ? $server->interface  : old('interface'), ['class'=>'form-control', 'id'=>'interface']) !!}
        </div>
        <div class="form-group col-md-6">
          {!! Form::label('image', 'Imagem', ['class'=> 'bmd-label-floating']) !!}
          {!! Form::text('image', isset($server) && $server->image && !old('image') != null ? $server->interface  : old('image'), ['class'=>'form-control', 'id'=>'image']) !!}
        </div>
    </div>