@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    @include('_flash_messages')

    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                @include('layouts.components._card-header', 
                [
                'icon'=>'assignment', 'tittle'=>"Editar detalhe do plano <span> $plan->name</span>", 
                'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('details.plan.index', $plan->url)]
                ])
                <div class="card-body">
                    <form method="POST" action="{{route('details.plan.update',[ $plan->url, $detail->id])}}" autocomplete="off"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.plans.details.partials._form')
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection