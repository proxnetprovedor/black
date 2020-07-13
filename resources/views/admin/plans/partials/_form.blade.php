
    <div class="row col-md-12" >
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Nome', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('name', isset($plan) && $plan->name && !old('name') != null ? $plan->name  : old('name') , ['class'=>'form-control', 'id'=>'name', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Descrição', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('description', isset($plan) && $plan->description && !old('description') != null ? $plan->description  : old('description') , ['class'=>'form-control', 'id'=>'description', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('url', 'URL', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('url', isset($plan) && $plan->url && !old('url') != null ? $plan->url  : old('url') , ['class'=>'form-control', 'id'=>'url', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price', 'Preço', ['class'=> 'bmd-label-floating']) !!}
                {!! Form::text('price', isset($plan) && $plan->price && !old('price') != null ? $plan->price  : old('price') , ['class'=>'form-control', 'id'=>'price', 'required']) !!}
            </div>
        </div>
        <div class="col-md-12">


            <div class="form-group">
                <label for="profiles" class="bmd-label-floating">Perfis de acesso *</label>
                <br>
                @foreach ($profiles as $profile)
                <div class="custom-control custom-checkbox custom-control-inline mb-2">
                    <input id="{{$profile->id}}" name="profile[]" class="custom-control-input" type="checkbox" value="{{ $profile->id }}"
                        {{ (in_array($profile->id, old('profiles', [])) || isset($role) && $role->profiles()->pluck('id')->contains($profile->id)) ? 'checked' : ''  }}>
                    <label class="custom-control-label" for="{{$profile->id}}">{{ $profile->name }}</label>
                </div>
                @endforeach
                @if($errors->has('profile'))
                <em class="invalid-feedback">
                    {{ $errors->first('profile') }}
                </em>
                @endif

            </div>
        </div>
    </div>