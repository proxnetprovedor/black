@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'home', 'tittle'=>"PROVEDORES", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('tenants.create')]
        ])
        
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table">
                  <thead>
                    <tr style="">
                      <th>Nome</th>
                      <th>CNPJ</th>
                      <th>E-mail</th>
                      <th>Ativa</th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($tenants as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->active}}</td>
                    <td class="td-actions text-right">
                      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('tenants.show', $item)}}">Detalhes</a>
                        <a class="dropdown-item" href="{{route('tenants.edit', $item->id)}}">Editar</a>
                        <a class="dropdown-item" href="">Excluir</a>
                      </div>
                      {{-- <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">person</i>
                      </button> --}}
                      {{-- <button type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button> --}}
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