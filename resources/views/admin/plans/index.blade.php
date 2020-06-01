@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    @include('_flash_messages')
    <div class="card">
        <!-- Card header -->
        @include('layouts.components._card-header', 
        [
          'icon'=>'assignment', 'tittle'=>"Planos", 
          'button'=>['active'=>true, 'tittle'=>'Novo Plano', 'route'=>route('plans.create')]
        ])
        <div class="card-body">
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th>Provedoras</th>
                            <th>Detalhes</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plans as $plan)
                        <tr>
                            <th class="text-center">
                                <span class="">{{$plan->name}}</span>
                            </th>
                            <td class="budget">
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <span class="">
                                    <span class="status">{{$plan->description}}</span>
                                </span>
                            </td>
                            <td>
                                <a href="#">
                                    <i class="fa fa-users"> Provedoras </i>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('details.plan.index', $plan->url)}}">
                                    <i class="fa fa-pencil"> Detalhes</i>
                                </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-arrow" style="">
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
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
            {!! $plans->links() !!}

        </div>
    </div>
</div>
@endsection