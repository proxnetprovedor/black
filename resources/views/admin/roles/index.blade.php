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
        'icon'=>'list', 'tittle'=>"Perfis de acesso do usu", 
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
                                @foreach($role->permissions()->pluck('name') as $permission)
                                <span class="badge badge-info">{{ $permission }}</span>
                                @endforeach
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

                                        {{-- <form id="form" action="{{route('roles.destroy', $role->id)}}"
                                        method="POST"
                                        onsubmit="return confirm('Você realmente deseja deleta o perfil de acesso ' .
                                        $role->name . ' ?');">

                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <a class="dropdown-item" href="#" type="submit"
                                            onclick="document.getElementById('form'').submit();">
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
@endsection