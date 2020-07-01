@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        </ol>
    </nav>
    @include('_flash_messages')
    <div class="card">
        <!-- Card header -->
        @include('layouts.components._card-header',
        [
        'icon'=>'assignment', 'tittle' => "Colaboradores",
        'button'=>['active'=>true, 'tittle'=>'Novo Colaborador', 'route'=>route('employees.create')]
        ])
        <div class="card-body">
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th>Função</th>
                            <th>Salário</th>
                            <th>Carga Horária</th>
                            <th>Perfil de acesso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                        <tr>
                            <th class="text-center">
                                <span class="">{{$employee->name}}</span>
                            </th>

                            <th class="">
                                {{$employee->function}}
                            </th>

                            <td class="budget">
                                R$ {{ number_format($employee->salary, 2, ',', '.') }}
                            </td>
                            <td>
                                <span class="">
                                    <span class="status">{{$employee->working_hours}}</span>
                                </span>
                            </td>



                            <td>
                                <a href="{{ route('user.roles', $employee->user) }}">
                                    <i class="fa fa-sitemap"> Perfil</i>
                                </a>
                            </td>


                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu  dropdown-menu-arrow" style="">
                                        <a class="dropdown-item"
                                            href="{{route('employees.edit', $employee)}}">Editar</a>
                                        {{-- <a class="dropdown-item"
                                            href="{{route('employees.show', $employee)}}">Visualizar</a> --}}
                                        <a class="dropdown-item" href="#"
                                            onclick="deleteEmployee({{$employee}})">Deletar</a>

                                    </div>
                                    <form id="{{$employee->id}}" action="{{route('employees.destroy', $employee)}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                </div>
                            </td>
                            @empty
                            <td>
                                <p>Sem colaboradores cadastrados no momento</p>
                            </td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
            {!! $employees->links() !!}

        </div>
    </div>
</div>
@endsection


<script>
    function deleteEmployee(employee){
        if(confirm('Você realmente deseja deletar o colaborador '+employee.name+' ?'))
        {
            form = document.getElementById(employee.id);
            form.submit();
        } 
    }
</script>