@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    <div class="col-md-12">
      @include('_flash_messages')
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"CTOS", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('ctos.create')]
        ])
        
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="">
                  <th>Nome</th>
                  <th>Numero</th>
                  <th>Capacidade</th>
                  <th class="disabled-sorting text-right">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ctos as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->number}}</td>
                    <td>{{$item->capacity}}</td>
                    <td class="td-actions text-right">
                      <a class="btn btn-primary" href="{{route('ctos.show', $item)}}">
                        <i class="material-icons">info</i>
                      </a>
                      <a class="btn btn-success" href="{{route('ctos.edit', $item)}}">
                        <i class="material-icons">edit</i>
                      </a>
                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>  
                @endforeach
              </tbody>
            </table>
            {{ $ctos->links() }}
          </div>
        </div>
          <!-- end content-->
      </div>
        <!--  end card  -->
    </div>
</div>
@endsection