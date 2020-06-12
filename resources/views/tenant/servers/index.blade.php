@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">

  <div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('servers.index')}}">Servidores</a></li>

      </ol>
    </nav>
    @include('_flash_messages')
    <div class="card">
      @include('layouts.components._card-header',
      [
      'icon'=>'dns', 'tittle'=>"SERVIDORES",
      'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('servers.create')]
      ])
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>IP</th>
                <th>Porta</th>
                <th class="text-right">Login</th>
                <th class="text-right">Interface</th>
                <th class="text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($servers as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td class="text-right">{{$item->ip_address}}</td>
                <td>{{$item->port}}</td>
                <td class="text-right">{{$item->login}}</td>
                <td class="text-right">{{$item->login}}</td>
                <td class="td-actions text-right">
                  <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="{{route('servers.show', $item->id)}}">Detalhes</a>
                    <a class="dropdown-item" href="{{route('servers.edit', $item->id)}}">Editar</a>
                    <a onclick="event.preventDefault(); document.getElementById('form-delete-{{ $item->id }}').submit();"
                      class="dropdown-item" href="">Excluir</a>
                  </div>
                  
                  <form action="{{ route('servers.destroy', $item->id) }}" method="post"
                    id="form-delete-{{ $item->id }}">
                    @method('delete')
                    @csrf
                  </form>

                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
          {{ $servers->links() }}
        </div>
      </div>
    </div>
  </div>
  @endsection