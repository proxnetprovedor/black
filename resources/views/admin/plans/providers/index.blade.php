@extends('layouts.admin')


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
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Provedoras do plano <strong>{{ $plan->name }} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('plans.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>


                </div>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($providers as $provider)
                        <tr>
                            <td>
                                {{ $provider->name }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-arrow" style="">
                                        {{-- <a class="dropdown-item"
                                            href="{{ route('providers.plan.edit', [$plan->url, $provider->id]) }}">Editar</a>
                                        <a class="dropdown-item"
                                            href="{{ route('providers.plan.show', [$plan->url, $provider->id]) }}">Visualizar</a>
                                        --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer py-4">
            {!! $providers->links() !!}
        </div>
    </div>

</div>



@endsection