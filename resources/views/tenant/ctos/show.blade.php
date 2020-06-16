@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('ctos.index')}}">CTOS</a></li>
          <li class="breadcrumb-item active"><a href="#">{{$cto->name}}</a></li>
        </ol>
      </nav>
    </div>
    <div class="col-12">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          @include('layouts.components._card-header',
          [
          'icon'=>'home', 'tittle'=>"CTO $cto->name" ,
          'button'=>['active'=>true, 'tittle'=>'voltar', 'route'=>route('ctos.index')]
          ])
          <div class="card-body">
            <div class="table-responsive">
              <div></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="card">
          @include('layouts.components._card-header',
          [
          'icon'=>'home', 'tittle'=>"Instalações",
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('instalations.create')]
          ])

          <div class="card-body">
          </div>
        </div>
      </div>
    </div>
  </div>
  
      
</div>
@endsection