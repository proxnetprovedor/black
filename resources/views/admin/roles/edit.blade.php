@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3>Editar <strong> {{$role->name}} </strong></h3>

                </div>
                <div class="col-md-4 text-right">
                    <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista </a>
                </div>
            </div>
        </div>

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