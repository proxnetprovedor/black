@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'assignment', 'tittle'=>"Novo Plano", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('plans.index')]
        ])

        <div class="card-body">
            <form method="POST" action="{{route('plans.store')}}" autocomplete="off" enctype="multipart/form-data">
                @include('admin.plans.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection