@extends('layouts.admin')


@section('content')
<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Colaboradores</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Perfis de acesso do usuário <strong>{{ $user->name }} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('employees.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>

                </div>
            </div>

        </div>
        <div class="card-body">
            <form action="{{ route('user.roles.sync', $user) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="profiles" class="bmd-label-floating">Perfis *</label>
                    <br>
                    @foreach ($roles as $role)
                    <div class="custom-control custom-checkbox custom-control-inline mb-2">
                        <input id="{{$role->id}}" name="roles[]" class="custom-control-input" type="checkbox"
                            value="{{ $role->id }}"
                            {{ (in_array($role->id, old('roles', [])) || isset($user) && $user->roles()->pluck('id')->contains($role->id)) ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="{{$role->id}}">{{ $role->name }}</label>
                    </div>
                    @endforeach
                    @if($errors->has('role'))
                    <em class="invalid-feedback">
                        {{ $errors->first('role') }}
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