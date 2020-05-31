@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Novo Perfil de acesso (Provedores)</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('profiles.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>
                   
                </div>
            </div>

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('profiles.store')}}" autocomplete="off" enctype="multipart/form-data">
                @include('admin.profiles.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection