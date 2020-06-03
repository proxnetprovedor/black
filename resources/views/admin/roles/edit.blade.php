@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    @include('_flash_messages')
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
                <div>
                    <button class="btn btn-success mt-4" type="submit">Salvar</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection