@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"INSTALAÇÕES", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('instalations.create')]
        ])
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                  <thead>
                    <tr style="">
                      <th class="text-right">SSID</th>
                      <th class="text-right">Radio IP</th>
                      <th class="text-right">ONU IP</th>
                      <th class="text-right">ONU MAC</th>
                      <th class="text-right">Caixa Switch</th>
                      <th class="text-right">Switch</th>
                      <th class="text-right">PPoe </th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($instalations as $item)
                <tr>
                    <td class="text-right">{{$item->ssid}}</td>
                    <td class="text-right">{{$item->radio_ip}}</td>
                    <td class="text-right">{{$item->onu_ip}}</td>
                    <td class="text-right">{{$item->onu_mac}}</td>
                    <td class="text-right">{{$item->caixa_switch}}</td>
                    <td class="text-right">{{$item->switch_porta}}</td>
                    <td class="text-right">{{$item->pppoe_port}}</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">person</i>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
              {{ $instalations->links() }}
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
</div>
@endsection