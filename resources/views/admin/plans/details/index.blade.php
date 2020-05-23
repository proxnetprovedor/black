@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detalhes do plano <strong> {{$plan->name}} </strong></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('plans.index')}}" class="btn btn-sm btn-secondary">Voltar
                                para a lista</a>
                            <a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-sm btn-primary">Novo
                                detalhe</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nome</th>
                                <th width="150">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($details as $detail)
                            <tr>
                                <td>
                                    {{ $detail->name }}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                            <a class="dropdown-item"
                                                href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}">Editar</a>
                                            <a class="dropdown-item"
                                                href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}">Visualizar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    {!! $details->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection