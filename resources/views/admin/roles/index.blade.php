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
                            @foreach($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">


                                <td>
                                    {{ $role->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($role->permissions()->pluck('name') as $permission)
                                    <span class="badge badge-info">{{ $permission }}</span>
                                    @endforeach
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">

                                            <a class="dropdown-item" href="{{route('roles.edit', $role)}}">Editar</a>

                                            <a class="dropdown-item"
                                                href="{{route('roles.show', $role)}}">Visualizar</a>

                                            {{-- <form id="form" action="{{route('roles.destroy', $role->id)}}" method="POST"
                                                onsubmit="return confirm('Você realmente deseja deleta o perfil de acesso ' . $role->name . ' ?');">

                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <a class="dropdown-item" href="#" type="submit" onclick="document.getElementById('form'').submit();">
                                                    Deletar
                                                </a>

                                            </form> --}}
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
</div>
@endsection