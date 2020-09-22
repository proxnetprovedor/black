@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('servers.index')}}">Servidores</a></li>
        <li class="breadcrumb-item active"><a href="#">{{$server->name}}</a></li>
      </ol>
    </nav>
    <div class="col-md-12">
      <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"EDITAR SERVIDOR", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('servers.index')]
        ])
        <div class="card-body">
          <form action="{{route('servers.update', $server)}}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
            @method('PUT')
            @include('tenant.servers.partials._form')
            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary col-12">Salvar</button>
            </div>
          </form>
            
        </div>
        
        <!--  end card  -->
    </div>
</div>
@endsection