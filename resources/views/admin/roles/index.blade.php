@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        </ol>
    </nav>

    <div class="card">
        @include('layouts.components._card-header',
        [
        'icon'=>'list', 'tittle' => "Perfis de acesso do usuário",
        'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('roles.create')]
        ])
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table ">
                    <thead class="">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">
                                Nome
                            </th>
                            <th scope="col" class="sort" data-sort="budget">
                                Permissões
                            </th>
                            <th scope="col">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">


                            <td>
                                {{ $role->name ?? '' }}
                            </td>
                            <td>
                                <div class="row">
                                    @foreach($role->permissions()->pluck('name') as $permission)
                                    <div class="col-md-4">
                                        <span class="badge badge-info">{{ $permission }}</span>
                                    </div>
                                    @endforeach
                                </div>

                            </td>

                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">

                                        <a class="dropdown-item" href="{{route('roles.edit', $role)}}">Editar</a>

                                        <a class="dropdown-item" href="{{route('roles.show', $role)}}">Visualizar</a>
                                    </div>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
@endsection