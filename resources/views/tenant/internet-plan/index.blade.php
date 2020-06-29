@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    
    <div class="col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Planos de Internet</a></li>
        </ol>
      </nav>
      @include('_flash_messages')
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"PLANOS DE INTERNET", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('internet-plans.create')]
        ])
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                  <thead>
                    <tr style="">
                      <th class="text-right">Nome</th>
                      <th class="text-right">Preço</th>
                      <th class="text-right">Download</th>
                      <th class="text-right">Upload</th>
                      <th class="text-right">É PPoe?</th>
                      <th class="text-right">É Hotpost?</th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($internetPlans as $item)
                <tr>
                    <td class="text-right">{{$item->name}}</td>
                    <td class="text-right">{{$item->price}}</td>
                    <td class="text-right">{{$item->download_rate}}</td>
                    <td class="text-right">{{$item->upload_rate}}</td>
                    <td class="text-right">{{$item->is_ppoe}}</td>
                    <td class="text-right">{{$item->is_hotpost}}</td>
                    
                    <td class="td-actions text-right">
                      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('internet-plans.show', $item->id)}}">Detalhes</a>
                        <a class="dropdown-item" href="{{route('internet-plans.edit', $item->id)}}">Editar</a>
                        <a class="dropdown-item" href="">Excluir</a>
                      </div>
                      
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
              {{ $internetPlans->links() }}
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
</div>
@endsection