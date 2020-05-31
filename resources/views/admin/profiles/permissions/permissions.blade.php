@extends('layouts.admin')


@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Permissões do perfil <strong>{{ $profile->name }} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('profiles.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>

                </div>
            </div>

        </div>
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