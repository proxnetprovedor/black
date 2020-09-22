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
                <!--class="text-right"-->
                <th>SERVIDOR</th>
                <th>IP : PORTA</th>
                <th>UPTIME E CPU</th>
                <th>ARMAZENAMENTO</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($servers as $item)
              <tr>
                <td id="server{{$item->id}}">{{$item->name}}</td>
                <td>{{$item->ip_address}}:{{$item->port}}</td>
                <td id="uptime{{$item->id}}">...</td>
                <td id="armazenamento{{$item->id}}">...</td>
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
                    <a data-toggle="modal" data-target="#deleteServerModal" class="dropdown-item">Excluir</a>
                  </div>

                  <form action="{{ route('servers.destroy', $item->id) }}" method="post"
                    id="form-delete-{{ $item->id }}">
                    @method('delete')
                    @csrf
                  </form>

                </td>
              </tr>
            </tbody>
            @include('tenant.servers.modals.index.deleteServerModal')
            @endforeach
          </table>
          {{ $servers->links() }}
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('scripts_after_body')
  <script>
    function deleteServer(id){
      let form = $(`#form-delete-${id}`)
      return form.submit();
    }
    @foreach ($servers as $item)
      $.ajax({
        type: "GET",
        url: '{{route('servers.info' , ['server' => $item->id])}}',
        success: function (data) {
          data = JSON.parse(data);
          let user = data['ppp_actives'] == 1 ? 'usu&aacute;rio' : 'usu&aacute;rios';
          document.getElementById('server{{$item->id}}').innerHTML =
            '<b>' + '{{ $item->name }}' + '</b> - ' + data['board-name'] +
            ' - ' + data['ppp_actives'] + ' ' + user + ' conectados <br/>' +
            data['cpu'] + ' - ' + data['cpu-frequency'] + ' MHz - ' + data['cpu-count'] +
            ' Cores Versão: ' + data['version'];
          document.getElementById('uptime{{$item->id}}').innerHTML =
            "<i class='fa fa-fw fa-clock-o'></i>" + data['uptime'] +
            "<br>" +
            "<i class='fa fa-fw fa-snowflake-o'></i> CPU: " + data['cpu-load'] +
            "%";
          document.getElementById('armazenamento{{$item->id}}').innerHTML =
            "<i class='fa fa-fw fa-database'></i> HDD Livre: " +
            data['free-hdd-space'] + " de " + data['total-hdd-space'] + "<br>" +
            "<i class='fa fa-fw fa-microchip'></i> RAM Livre: " +
            data['free-memory'] + " de " + data['total-memory'];
          //console.log(data);
        },
        error: function (data,err,err2){
          console.log(data,err,err2);
        },
      })
    @endforeach
  </script>
  @endsection