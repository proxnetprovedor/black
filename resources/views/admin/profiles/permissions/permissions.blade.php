@extends('layouts.admin')


@section('content')
<div class="col-md-12">
    <div class="card">
        @include('layouts.components._card-header', 
        [
        'icon'=>'assignment', 'tittle'=>"Permissões do perfil $profile->name", 
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('profiles.index')]
        ])
        <div class="card-body">
            <form action="{{ route('profiles.permissions.sync', $profile) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="permissions" class="bmd-label-floating">Permissões *</label>
                    <br>
                    @foreach ($permissions as $permission)
                    <div class="custom-control custom-checkbox custom-control-inline mb-2">
                        <input id="{{$permission->id}}" name="permission[]" class="custom-control-input" type="checkbox"
                            value="{{ $permission->id }}"
                            {{ (in_array($permission->id, old('permission', [])) || isset($profile) && $profile->permissions()->pluck('id')->contains($permission->id)) ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="{{$permission->id}}">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                    @if($errors->has('permission'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permission') }}
                    </em>
                    @endif

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection