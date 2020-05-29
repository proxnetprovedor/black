@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
              <h6 class="card-title">Provedoras</h6>
            </div>
            
          </div>
          <div class="card-body">
            <div class="toolbar">
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr style="">
                      <th>Nome</th>
                      <th>CNPJ</th>
                      <th>E-mail</th>
                      <th>Ativa</th>
                      <th class="disabled-sorting text-right">Ações</th>
                    </tr>
                  </thead>
                <tbody>
                @foreach ($tenants as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->active}}</td>
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