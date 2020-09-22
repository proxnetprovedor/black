@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes do Plano</a></li>
        </ol>
    </nav>
    @include('_flash_messages')

    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                @include('layouts.components._card-header',
                [
                'icon'=>'assignment', 'tittle'=>"Editar detalhe do plano $plan->name",
                'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('details.plan.index', $plan->url)]
                ])
                <div class="card-body">
                    <form method="POST" action="{{route('details.plan.update',[ $plan->url, $detail->id])}}"
                        autocomplete="off" enctype="multipart/form-data">
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