@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    
    <div class="col-md-12">
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
                  <th class="text-center">#</th>
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
                  <td class="text-center">1</td>
                  <td>{{$item->name}}</td>
                  <td class="text-right">{{$item->ip_address}}</td>
                  <td>{{$item->port}}</td>
                  <td class="text-right">{{$item->login}}</td>
                  <td class="text-right">{{$item->login}}</td>
                  <td class="td-actions text-right">
                    <a class="btn btn-info" href="{{route('servers.show', $item)}}">
                      <i class="material-icons">info</i>
                    </a>
                    <a class="btn btn-success" href="{{route('servers.edit', $item)}}">
                      <i class="material-icons">edit</i>
                    </a>
                    <form class="" action="{{ route('servers.destroy', $item) }}" method="post">
                      @csrf
                        @method('DELETE')
                        <button type="button" rel="tooltip" class="btn btn-danger"
                            onclick="return confirm('Você realmente deseja deletar o servidor {{$item->name}} ?')">
                            <i class="material-icons">close</i>
                        </button>
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