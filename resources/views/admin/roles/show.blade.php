@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    @include('_flash_messages')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Perfil de acesso do usuário</a></li>
        </ol>
    </nav>
    <div class="card">
        @include('layouts.components._card-header',
        [
        'icon'=>'assignment', 'tittle'=>"Detalhes do perfil de acesso $role->name",
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('roles.index')]
        ])
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $role->name }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $role->description }}
                </li>

                <hr>
                <li>
                    <strong>Permissões Vinculadas :</strong>
                    @foreach ($role->permissions as $permission)
                <li>{{$permission->name}}</li>
                @endforeach
                </li>

            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('roles.destroy', $role) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Você realmente deseja deletar o perfil {{$role->name}} ?')">Deletar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection