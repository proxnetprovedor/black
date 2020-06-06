
    <div class="row col-md-12" >
        <div class="form-group col-md-12">
            {!! Form::label('ssid', 'SSID', ['class'=> 'bmd-label-floating']) !!}
            {!! Form::text('ssid', isset($instalation) && $instalation->ssid && !old('ssid') != null ? $instalation->ssid  : old('ssid') , ['class'=>'form-control', 'id'=>'ssid']) !!}
        </div>
    </div>