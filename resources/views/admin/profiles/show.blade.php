@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    @include('_flash_messages')
    <div class="card">
        <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title"> Detalhes do perfil <strong> {{$profile->name}} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('profiles.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>
                </div>
            </div>
        </div>
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