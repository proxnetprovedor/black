@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Colaboradores</a></li>
        </ol>
    </nav>
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header',
        [
        'icon'=>'assignment', 'tittle'=>"Editar Colaborador",
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('employees.index')]
        ])
        <div class="card-body">
            <form method="POST" action="{{route('employees.update', $employee)}}" autocomplete="off"
                enctype="multipart/form-data">
                @method('PUT')
                @include('tenant.employees.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>

            <form method="POST" action="{{route('user.change.password', $employee->user)}}">
                @method('PUT')
                @csrf
                @include('tenant.employees.partials._password')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar Senha</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection