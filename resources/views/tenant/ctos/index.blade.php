@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    <div class="col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{route('ctos.index')}}">CTOS</a></li>
        </ol>
      </nav>
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
                      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        <p class="d-lg-none d-md-block">Account</p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('ctos.show', $item->id)}}">Detalhes</a>
                        <a class="dropdown-item" href="{{route('ctos.edit', $item->id)}}">Editar</a>
                        <a class="dropdown-item" href="">Excluir</a>
                      </div>
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
        <div class="col-md-6">
          <div class="card ">
            <div class="card-header card-header-text card-header-rose">
              <div class="card-text">
                <h4 class="card-title">Custom Skin & Settings Map</h4>
              </div>
            </div>
            <div class="card-body ">
              <h4 class="card-title"></h4>
              <div id="customSkinMap" class="map"></div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbu1X_x1tXwgBaUmzJI9Qr55RyEkOPUaQ"></script>


