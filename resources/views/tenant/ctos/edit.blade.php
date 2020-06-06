@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <div class="card">
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"EDITAR CTO", 
          'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('ctos.index')]
        ])
        <div class="card-body">
          <form action="{{route('ctos.update', $cto)}}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
            @method('PUT')
            @include('tenant.ctos.partials._form')
            <div class="card-footer">
              <button type="submit" class="btn btn-fill btn-primary col-12">Salvar</button>
            </div>
          </form>
            
        </div>
        
        <!--  end card  -->
    </div>
</div>
@endsection