@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"CTOS", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('tenants.create')]
        ])
        
        <div class="card-body">
          
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr style="">
                      <th>Nome</th>
                      <th>Numero</th>
                      <th>Capacidade</th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($ceos as $item)
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
                      <button type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
</div>
@endsection