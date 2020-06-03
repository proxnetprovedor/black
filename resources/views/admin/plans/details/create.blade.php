@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    @include('_flash_messages')


    <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'assignment', 'tittle'=>"Novo detalhe do plano $plan->name", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('details.plan.index', $plan->url)]
        ])
        <div class="card-body">
            <form method="POST" action="{{route('details.plan.store', $plan->url)}}" autocomplete="off"
                enctype="multipart/form-data">
                @include('admin.plans.details.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection