@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    <div class="col-md-12">
      @include('_flash_messages')
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"CTOS", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('ctos.create')]
        ])
        
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="">
                  <th>Nome</th>
                  <th>Numero</th>
                  <th>Capacidade</th>
                  <th class="disabled-sorting text-right">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ctos as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->number}}</td>
                    <td>{{$item->capacity}}</td>
                    <td class="td-actions text-right">
                      {{-- <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('tenants.show', $item->id)}}">Detalhes</a>
                        <a class="dropdown-item" href="{{route('tenants.edit', $item->id)}}">Editar</a>
                        <a class="dropdown-item" href="">Excluir</a>
                      </div> --}}
                      <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">person</i>
                      </button>
                      <a class="btn btn-success" href="{{route('ctos.edit', $item)}}">
                        <i class="material-icons">edit</i>
                      </a>
                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>  
                @endforeach
              </tbody>
            </table>
            {{ $ctos->links() }}
          </div>
        </div>
          <!-- end content-->
      </div>
        <!--  end card  -->
    </div>
</div>
@endsection