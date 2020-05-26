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
                    <h3 class="card-title">Editar Plano</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('plans.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('plans.update', $plan)}}" autocomplete="off"
                enctype="multipart/form-data">
                @method('PUT')
                @include('admin.plans.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection