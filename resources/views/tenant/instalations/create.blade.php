@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    
    <div class="col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('instalations.index')}}">Instalações</a></li>
          <li class="breadcrumb-item active"><a href="#">Novo</a></li>
        </ol>
      </nav>
      @include('_flash_messages')
      <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"CRIAR INSTALAÇÃO", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('instalations.index')]
        ])
        <div class="card-body">
          <form action="{{route('instalations.store')}}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
            @include('tenant.instalations.partials._form')
            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary col-12">Salvar</button>
            </div>
          </form>
            
        </div>
        
        <!--  end card  -->
    </div>
</div>
@endsection