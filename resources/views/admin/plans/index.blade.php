@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Planos</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('plans.create')}}" class="btn btn-sm btn-primary">Novo
                                plano</a>
                        </div>
                    </div>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nome</th>
                                <th scope="col" class="sort" data-sort="budget">Preço</th>
                                <th scope="col" class="sort" data-sort="status">Descrição</th>
                                <th scope="col">Restaurantes</th>
                                <th scope="col" class="sort" data-sort="completion">Detalhes</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($plans as $plan)
                            <tr>
                                <th scope="row">
                                    <span class="name mb-0 text-sm">{{$plan->name}}</span>
                                </th>
                                <td class="budget">
                                    R$ {{ number_format($plan->price, 2, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$plan->description}}</span>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-users"> Restaurantes </i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('details.plan.index', $plan->url)}}">
                                        <i class="fa fa-pencil">Detalhes</i>
                                    </a>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                            <a class="dropdown-item" href="{{route('plans.edit', $plan)}}">Editar</a>
                                            <a class="dropdown-item" href="{{route('plans.show', $plan)}}">Visualizar</a>
                                        </div>
                                    </div>
                                </td>
                                @empty
                                <td>
                                    <p>Sem planos cadastrados no momento</p>
                                </td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {!! $plans->links() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection