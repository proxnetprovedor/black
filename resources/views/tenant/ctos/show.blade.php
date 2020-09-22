@extends('layouts.admin')

@section('title','Provedoras')


@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tenant.infra.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('ctos.index')}}">CTOS</a></li>
          <li class="breadcrumb-item active"><a href="#">{{$cto->name}}</a></li>
        </ol>
      </nav>
    </div>
    <div class="col-12">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          @include('layouts.components._card-header',
          [
          'icon'=>'home', 'tittle'=>"CTO $cto->name" ,
          'button'=>['active'=>true, 'tittle'=>'voltar', 'route'=>route('ctos.index')]
          ])
          <div class="card-body">
            <form action="{{ route('ctos.update', $cto) }}" method="post" id="formCto">
              @csrf
              <input type="hidden" name="_method" value="put" id="_method">

              @include('tenant.ctos.partials._form')

              <div class="card-footer ">
                <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block mr-2" data-toggle="modal"
                    data-target="#deleteCtoModal">Excluir</button>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-block ml-2">Salvar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="card">
            @include('layouts.components._card-header-screenShow',
            [
            'icon'=>'home', 'tittle'=>"Assinaturas",
            'button'=>['active'=>true, 'tittle'=>'Novo', 'toggle'=> 'modal', 'target' => '#addSubscritionModal']
            ])

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="text-primary">
                      <th>Login</th>
                      <th>Senha</th>
                      <th>IP</th>
                      <th>Divisor</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cto->subscriptions as $subscription)
                    <tr>
                      <td>{{ $subscription->login }}</td>
                      <td>{{ $subscription->password }}</td>
                      <td>{{ $subscription->ip_address }}</td>
                      <td>{{ $subscription->pivot->spliter }}</td>
                      <td class="td-actions">
                        <button class="btn btn-sm btn-link btn-primary" data-toggle="modal"
                          data-target="#editSubscritionModal">
                          <i class="material-icons">edit</i>
                        </button>
                        <button class="btn btn-sm btn-link btn-danger" data-toggle="modal"
                          data-target="#deleteSubscritionModal">
                          <i class="material-icons">delete</i>
                        </button>
                      </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">Nenhum registro cadastrado.</div>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="card">
            @include('layouts.components._card-header-screenShow',
            [
            'icon'=>'home', 'tittle'=>"Instalações",
            'button'=>['active'=>true, 'tittle'=>'Novo', 'toggle'=> 'modal', 'target' => '#addInstalationModal']
            ])

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="text-primary">
                      <th>SSID</th>
                      <th>Radio IP</th>
                      <th>ONU MAC</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cto->instalations as $install)

                    <tr data-toggle="collapse" data-target="#{{ $install->id }}" class="accordion-toggle"
                      style="cursor: pointer;" aria-controls="#{{ $install->id }}">

                      <td>{{ $install->ssid }}</td>
                      <td>{{ $install->radio_ip }}</td>
                      <td>{{ $install->onu_mac }}</td>
                    </tr>
                    <tr>
                      <td colspan="7" class="hiddenRow" style="padding: 0;">
                        <div class="accordion-body collapse" id="{{ $install->id }}">
                          <table style="width: 100%">
                            <caption class="text-center">
                              <h5>Assinaturas da instalação {{ $install->ssid }}</h5>
                            </caption>
                            <thead>
                              <tr>
                                <th>Login</th>
                                <th>Senha</th>
                                <th>IP</th>
                                <th>Divisor</th>
                                <th>Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($install->subscriptions as $subscrition)
                              <tr>
                                <td>
                                  {{ $subscrition->login }}
                                </td>
                                <td>
                                  {{ $subscrition->password }}
                                </td>
                                <td>
                                  {{ $subscrition->ip_address }}
                                </td>
                                <td>
                                  {{ $cto->subscriptions()->where('subscription_id', $subscrition->id)->first()->pivot->spliter }}
                                </td>
                                <td class="td-actions text-right">
                                  <button type="button" class="btn btn-sm btn-link btn-primary" data-toggle="modal"
                                    data-target="#editSubscritionModal">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" class="btn btn-sm btn-link btn-danger" data-toggle="modal"
                                    data-target="#deleteSubscritionModal">
                                    <i class="material-icons">delete</i>
                                  </button>
                                </td>
                              </tr>
                              @empty
                              <br>
                              <div class="alert alert-info">Nenhuma Assinatura</div>
                              @endforelse
                            </tbody>
                          </table>
                        </div>
                      </td>

                    </tr>
                    @empty
                    <div class="alert alert-info">Nenhum registro cadastrado.</div>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('tenant.ctos.modals.show.cto.deleteCtoModal')
@include('tenant.ctos.modals.show.subscription.addSubscriptionModal')
@include('tenant.ctos.modals.show.subscription.editSubscriptionModal')
@include('tenant.ctos.modals.show.subscription.deleteSubscriptionModal')
@include('tenant.ctos.modals.show.instalation.addInstalationModal')
@include('tenant.ctos.modals.show.instalation.editInstalationModal')

</div>
@endsection

@section('scripts_after_body')
<script>
  function deleteCto(id){
    let url = '{{ route("ctos.update", ":id") }}'
    url = url.replace(':id', id);
    $('#_method').val('delete')
    return  $('#formCto').attr('action', url).submit()
  }

</script>

@endsection