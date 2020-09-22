@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('internet-plans.index')}}">Planos de Internet</a></li>
          <li class="breadcrumb-item active"><a href="#">{{$internetPlan->price}}</a></li>
        </ol>
      </nav>
      <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"EDITAR PLANO", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('internet-plans.index')]
        ])
        <div class="card-body">
          <form action="{{route('internet-plans.update', $internetPlan)}}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
            @method('PUT')
            @include('tenant.internet-plan.partials._form')
            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary col-12">Salvar</button>
            </div>
          </form>
            
        </div>
        
        <!--  end card  -->
    </div>
</div>
@endsection