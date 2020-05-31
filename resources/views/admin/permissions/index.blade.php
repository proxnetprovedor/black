@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        <div class="card-header  card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">list</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Perfis de acesso</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('permissions.create')}}" class="btn btn-sm btn-primary">Nova permissão
                        </a>
                </div>
            </div>

        </div>
        <div class="card-body">


            <div class="table-responsive">
                <table class=" table ">
                    <thead class="">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">
                                Nome
                            </th>
                            <th scope="col" class="sort" data-sort="budget">
                                Descrição
                            </th>
                            <th scope="col">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">


                            <td>
                                {{ $permission->name ?? '' }}
                            </td>
                            <td>
                               {{ $permission->description }}
                            </td>

                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">

                                        <a class="dropdown-item" href="{{route('permissions.edit', $permission)}}">Editar</a>

                                        <a class="dropdown-item" href="{{route('permissions.show', $permission)}}">Visualizar</a>
                                       
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