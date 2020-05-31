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
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('tenants.index')]
        ])
        <div class="card-body">
          <form action="{{route('tenants.update', $tenant)}}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
            @method('PUT')
            @include('admin.tenants.partials._form')
            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary col-12">Salvar</button>
            </div>
          </form>
            
        </div>
        
        <!--  end card  -->
    </div>
</div>
@endsection