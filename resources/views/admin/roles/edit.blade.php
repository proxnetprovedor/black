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
        'icon'=>'assignment', 'tittle'=>"Editar $role->name",
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('roles.index')]
        ])
        <div class="card-body">
            <form action="{{ route("roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.roles.partials._form')
                <div class="card-footer d-flex justify-content-center">
                    <button class="btn btn-success mt-4" type="submit">Salvar</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection