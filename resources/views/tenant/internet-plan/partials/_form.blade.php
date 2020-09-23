
    <div class="row col-md-12" >
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Nome', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('name', isset($internetPlan) && $internetPlan->name && !old('name') != null ? $internetPlan->name  : old('name') , ['class'=>'form-control', 'id'=>'name', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price', 'Preço', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('price', isset($internetPlan) && $internetPlan->price && !old('price') != null ? $internetPlan->price  : old('price') , ['class'=>'form-control', 'id'=>'price', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('download_rate', 'Taxa de Donwload', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('download_rate', isset($internetPlan) && $internetPlan->download_rate && !old('download_rate') != null ? $internetPlan->download_rate  : old('download_rate') , ['class'=>'form-control', 'id'=>'download_rate', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('upload_rate', 'Taxa de Upload', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('upload_rate', isset($internetPlan) && $internetPlan->upload_rate && !old('upload_rate') != null ? $internetPlan->upload_rate  : old('upload_rate') , ['class'=>'form-control', 'id'=>'upload_rate', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('server_id', 'Servidor', ['class'=> 'bmd-label-floating']) !!}
                @php
                    $aux = [];
                @endphp
                @php
                foreach($servers as $server) {
                    $aux[$server->id] = $server->name;
                }
                @endphp
                {!! Form::select('server_id', $aux, old('upload_rate'), ['class'=>'form-control selectpicker text-uppercase', 'id'=>'server_id', 'required', 'data-style' => "btn btn-link"]) !!}
            </div>
        </div>

    </div>