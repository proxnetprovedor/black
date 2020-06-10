@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis de acesso do Provedor</a></li>
        </ol>
    </nav>
    @include('_flash_messages')
    <div class="card">
        @include('layouts.components._card-header',
        [
        'icon'=>'assignment', 'tittle'=>"Detalhes do perfil $profile->name",
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('profiles.index')]
        ])

        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $profile->description }}
                </li>

                <hr>
                <li>
                    <strong>Permissões :</strong>
                    @foreach ($profile->permissions as $permission)
                <li> {{$permission->name}} </li>
                @endforeach
                </li>
                <hr>
                <strong>Planos vinculados:</strong>
                @foreach ($profile->plans as $plan)
                <li> {{$plan->name}} </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('profiles.destroy', $profile) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Você realmente deseja deletar o perfil {{$profile->name}} ?')">Deletar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection