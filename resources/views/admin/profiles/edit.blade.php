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
        'icon'=>'assignment', 'tittle'=>"Editar Perfil",
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('profiles.index')]
        ])
        <div class="card-body">
            <form method="POST" action="{{route('profiles.update', $profile)}}" autocomplete="off"
                enctype="multipart/form-data">
                @method('PUT')
                @include('admin.profiles.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection