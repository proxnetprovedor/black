@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    
    <div class="col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Instalações</a></li>
        </ol>
      </nav>
      @include('_flash_messages')
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"INSTALAÇÕES", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('instalations.create')]
        ])
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                  <thead>
                    <tr style="">
                      <th class="text-right">SSID</th>
                      <th class="text-right">Radio IP</th>
                      <th class="text-right">ONU IP</th>
                      <th class="text-right">ONU MAC</th>
                      <th class="text-right">Caixa Switch</th>
                      <th class="text-right">Switch</th>
                      <th class="text-right">PPoe </th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($instalations as $item)
                <tr>
                    <td class="text-right">{{$item->ssid}}</td>
                    <td class="text-right">{{$item->radio_ip}}</td>
                    <td class="text-right">{{$item->onu_ip}}</td>
                    <td class="text-right">{{$item->onu_mac}}</td>
                    <td class="text-right">{{$item->caixa_switch}}</td>
                    <td class="text-right">{{$item->switch_porta}}</td>
                    <td class="text-right">{{$item->pppoe_port}}</td>
                    <td class="td-actions text-right">
                      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('instalations.show', $item->id)}}">Detalhes</a>
                        <a class="dropdown-item" href="{{route('instalations.edit', $item->id)}}">Editar</a>
                        <a class="dropdown-item" href="">Excluir</a>
                      </div>
                      
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
              {{ $instalations->links() }}
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
</div>
@endsection