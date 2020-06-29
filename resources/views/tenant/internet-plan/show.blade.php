@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('instalations.index')}}">Instalações</a></li>
          <li class="breadcrumb-item active"><a href="#">{{$instalation->ssid}}</a></li>
        </ol>
      </nav>
      <div class="card">
          @include('layouts.components._card-header',
          [
          'icon'=>'home', 'tittle'=>"INSTALAÇÃO $instalation->ssid" ,
          'button'=>['active'=>true, 'tittle'=>'voltar', 'route'=>route('instalations.index')]
          ])
    
          <div class="card-body">
            <div class="table-responsive">
              
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
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
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
      
</div>
@endsection