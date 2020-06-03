@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header', 
        [
        'icon'=>'list', 'tittle'=>"Datalhesdo plano $plan->name", 
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('details.plan.create', $plan->url)]
        ])
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead >
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
                            <td >
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-arrow" style="">
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
        </div>
        <div class="card-footer py-4">
            {!! $details->links() !!}
        </div>
    </div>

</div>



@endsection