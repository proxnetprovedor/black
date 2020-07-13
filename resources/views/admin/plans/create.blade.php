@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        </ol>
    </nav>
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon' => 'assignment', 'tittle' => "Novo Plano", 
          'button' => ['active'=>true, 'tittle'=>'Voltar', 'route'=>route('plans.index')]
        ])

        <div class="card-body">
            <form method="POST" action="{{route('plans.store')}}" autocomplete="off" enctype="multipart/form-data">
                {!! Form::token() !!}
                @include('admin.plans.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection