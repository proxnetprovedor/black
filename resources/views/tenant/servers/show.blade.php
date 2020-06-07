@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid">
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('servers.index')}}">Servidores</a></li>
      <li class="breadcrumb-item active"><a href="#">{{$server->name}}</a></li>
    </ol>
  </nav>
  <div class="row">    
    <div class="col-lg-5 col-md-12">
      <div class="card">
          @include('layouts.components._card-header',
          [
          'icon'=>'home', 'tittle'=>"SERVIDOR $server->name" ,
          'button'=>['active'=>true, 'tittle'=>'voltar', 'route'=>route('servers.index')]
          ])
    
          <div class="card-body">
            <div class="table-responsive">
              
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-12">
      <div class="card">
        @include('layouts.components._card-header',
        [
        'icon'=>'home', 'tittle'=>"PLANOS DE INTERNET",
        'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('tenants.create')]
        ])

        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="">
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Donwload</th>
                  <th>Upload</th>
                  <th class="disabled-sorting text-right">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($internetPlans as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->price}}</td>
                  <td>{{$item->download_rate}}</td>
                  <td>{{$item->upload_rate}}</td>
                  <td class="td-actions text-right">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                      <p class="d-lg-none d-md-block">
                        Account
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="{{route('tenants.show', $item->id)}}">Detalhes</a>
                      <a class="dropdown-item" href="{{route('tenants.edit', $item->id)}}">Editar</a>
                      <a class="dropdown-item" href="">Excluir</a>
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
  </div>
  
      
</div>
@endsection