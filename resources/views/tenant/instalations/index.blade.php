@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
      <div class="card">
        
        @include('layouts.components._card-header', 
        [
          'icon'=>'dns', 'tittle'=>"SERVIDORES", 
          'button'=>['active'=>true, 'tittle'=>'Novo', 'route'=>route('tenants.create')]
        ])
        
        <div class="card-body">
          
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr style="">
                      <th>SSID</th>
                      <th>Radio IP</th>
                      <th>ONU IP</th>
                      <th>ONU MAC</th>
                      <th>Caixa Switch</th>
                      <th>Switch</th>
                      <th>PPoe </th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($instalations as $item)
                <tr>
                    <td>{{$item->ssid}}</td>
                    <td>{{$item->radio_ip}}</td>
                    <td>{{$item->onu_ip}}</td>
                    <td>{{$item->onu_mac}}</td>
                    <td>{{$item->caixa_switch}}</td>
                    <td>{{$item->switch_porta}}</td>
                    <td>{{$item->pppoe_port}}</td>
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
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
</div>
@endsection