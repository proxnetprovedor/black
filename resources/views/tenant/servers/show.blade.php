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
          <form action="{{route('servers.update', $server)}}" method="post" id="formServer"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" id="method_id">

            <div class="form-group bmd-form-group">
              <label for="ip_address" class="bmd-label-floating">IP</label>
              <input type="text" id="ip_address" value="{{ $server->ip_address }}" name="ip_address"
                class="form-control">
            </div>

            <div class="form-group bmd-form-group">
              <label for="port" class="bmd-label-floating">Porta</label>
              <input type="text" id="port" value="{{ $server->port }}" name="port" class="form-control">
            </div>

            <div class="form-group bmd-form-group">
              <label for="login" class="bmd-label-floating">Login</label>
              <input type="text" id="login" value="{{ $server->login }}" class="form-control">
            </div>

            <div class="form-group bmd-form-group">
              <label for="interface" class="bmd-label-floating">Interface</label>
              <input type="text" id="interface" value="{{ $server->interface }}" name="interface" class="form-control">
            </div>
          </form>
        </div>
        <div class="card-footer d-flex justify-content-around">
          <div class="col-md-6">
            <button class="btn btn-danger btn-block" data-toggle="modal"
              data-target="#deleteServerModal">Excluir</button>
          </div>
          <div class="col-md-6 ">
            <button onclick="salveServer('{{ $server->id }}')" class="btn btn-primary btn-block">Salvar</button>
          </div>
        </div>

        @include('tenant.servers.modals.show.deleteServerModal')

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
            <table class="table table-hover">
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
                @forelse ($internetPlans as $item)
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

                  @empty
                  <div class="alert alert-info">Nenhum registro!</div>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>


  @endsection

  @section('scripts_after_body')
  <script>
    function deleteServer(id){
      let url = '{{ route("servers.destroy", ":id") }}'
      url = url.replace(':id', id);
      $('#formServer').attr('action', url)
      $('#method_id').val('delete')
      $('#formServer').submit()
   }

  function salveServer(id){
    let url = '{{ route("servers.update", ":id") }}'
    url = url.replace(':id', id);
    $('#formServer').attr('action', url)
    $('#method_id').val('PUT')
    $('#formServer').submit()
  }
  </script>
  @endsection