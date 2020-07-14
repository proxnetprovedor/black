@extends('layouts.admin')

@section('title','Clientes')


@section('content')

<div class="container-fluid mt--6">

  <div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('costumers.index') }}">Clientes</a></li>
      </ol>
    </nav>
    @include('_flash_messages')
    <div class="card">

      @include('layouts.components._card-header',
      [
      'icon'=>'dns', 'tittle'=>"CLIENTES",
      'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('costumers.create')]
      ])

      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr style="">
                <th class="text-left">NOME</th>
                <th class="text-left">TELEFONE</th>
                <th class="text-left">EMAIL</th>
                <th class="text-left">DATA DE NASCIMENTO</th>
                <th class="disabled-sorting text-right">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($costumers as $costumer)
              <tr>
                <td class="text-left">{{$costumer->name}}</td>
                <td class="text-left">{{$costumer->phone}}</td>
                <td class="text-left">{{$costumer->email}}</td>
                <td class="text-left">{{ isset($costumer->birth) ? $costumer->birth->format('d/m/Y') : ''}}</td>
                <td class="td-actions text-right">
                  <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="{{route('costumers.edit', $costumer->id)}}">Detalhes</a>
                    {{-- <a class="dropdown-item" href="{{route('costumers.edit', $item->id)}}">Editar</a> --}}
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#deleteCostumerModal">Excluir</a>

                  </div>

                </td>
              </tr>
              @include('tenant.costumers.modals.confirm_delete_modal')

              @endforeach
            </tbody>
          </table>
          {{ $costumers->links() }}
        </div>
      </div>
      <!-- end content-->
    </div>
    <!--  end card  -->
  </div>
</div>

<form action="" method="post" id="deleteCostumer">
  @method('delete')
  @csrf
</form>

@endsection

@section('scripts_after_body')
<script>
 
</script>
@endsection