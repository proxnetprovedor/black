@extends('layouts.admin')

@section('title','Formulario')


@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'list', 'tittle'=>"Permissões do sistema", 
          'button'=>['active'=>true, 'tittle'=>'Nova permissão', 'route'=>route('permissions.create')]
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
                               {{ $permission->description ?? '' }}
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
                {{ $permissions->links() }}
            </div>
        </div>


    </div>
</div>
@endsection