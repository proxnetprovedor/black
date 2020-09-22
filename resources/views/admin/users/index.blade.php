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
                            <h3 class="mb-0">Perfis de acesso</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">Novo
                                perfil de acesso</a>
                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class=" table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">
                                    Nome
                                </th>
                                <th scope="col" class="sort" data-sort="budget">
                                    Permissões
                                </th>
                                <th  scope="col">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection