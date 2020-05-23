@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    @include('_flash_messages')

    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Editar detalhe do plano <span>{{ $plan->name }}</span></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-sm btn-primary">Voltar
                                para a lista</a>
                        </div>
                    </div>
                </div>
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