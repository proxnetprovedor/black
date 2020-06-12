@extends('layouts.admin')

@section('content')


<div class="col-md-8">
    @include('_flash_messages')
    <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
                <i class="material-icons">perm_identity</i>
            </div>
            <h4 class="card-title">Perfil da sua empresa -
                <small class="category">{{$tenant->name}}</small>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tenant.profile.update', $tenant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4>Dados gerais</h4>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label class="bmd-label-floating">Empresa </label>
                            <input name="name" type="text" class="form-control"
                                value="{{isset($tenant->name) && $tenant->name && !old('name') ? $tenant->name :  old('name')}}">
                        </div>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input name="email" type="email" class="form-control"
                                value="{{isset($tenant->email) && $tenant->email && !old('email') ? $tenant->email :  old('email')}}">
                            @if($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">CNPJ</label>
                            <input name="cnpj" type="text" class="form-control"
                                value="{{isset($tenant->cnpj) && $tenant->cnpj && !old('cnpj') ? $tenant->cnpj :  old('cnpj')}}">
                            @if($errors->has('cnpj'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{$errors->first('cnpj')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Empresa ativa:</label>
                            <input disabled type="text" class="form-control"
                                value="{{$tenant->active ? 'SIM' : 'NÃO'}}">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-4">
                        <h4 class="title">Alterar logo</h4>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail img-circle">
                            <img src='{{$tenant->logo() ?? '../../../assets/img/placeholder.jpg'}}' alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                          <div>
                            <span class="btn btn-round btn-rose btn-file">
                              <span class="fileinput-new">Escolher uma nova logo</span>
                              <span class="fileinput-exists">Escolher outra logo</span>
                              <input type="hidden"><input type="file" name="logo">
                            <div class="ripple-container"></div></span>
                            <br>
                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Cancelar</a>
                          </div>
                        </div>
                      </div>

                    <hr>



                </div>

                <br>

                {{-- <h4>Coordenadas</h4>

                <br>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Latitude</label>
                            <input name="lat" type="text" class="form-control"
                                value="{{isset($tenant->lat) && $tenant->lat && !old('lat') ? $tenant->lat :  ''}}">
                            @if($errors->has('lat'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{$errors->first('lat')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Logintude</label>
                            <input name="lng" type="text" class="form-control"
                                value="{{isset($tenant->lng) && $tenant->lng && !old('lng') ? $tenant->lng :  ''}}">
                            @if($errors->has('lng'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{$errors->first('lng')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div> --}}

                <button type="submit" class="btn btn-rose pull-right">Atualizar</button>

                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-profile">
        <div class="card-avatar">
            <a href="#pablo">
                <img class="img" src="{{$tenant->logo() ?? ''}}">
            </a>
        </div>
        <div class="card-body">
            <h6 class="card-category text-gray">Plano</h6>
            <h4 class="card-title">{{$tenant->plan->name}}</h4>
            <p class="card-description " s>
                @foreach ($tenant->plan->details as $detail)
                {{$detail->name}} <br>
                @endforeach
            </p>
            <div class=" row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="">Data de assinatura</label>
                        <input disabled type="text" class="form-control"
                            value="{{isset($tenant) && $tenant->subscription_date ? \Carbon\Carbon::parse($tenant->subscription_date)->format('d/m/Y')  : ''}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="">Assinatura ativa</label>
                        <input disabled type="text" class="form-control"
                            value="{{$tenant->subscription_active ? 'SIM' : 'NÃO'}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="">Assinatura suspensa</label>
                        <input disabled type="text" class="form-control"
                            value="{{$tenant->subscription_suspende ? 'SIM' : 'NÃO'}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="">Expira (final):</label>
                        <input disabled type="text" class="form-control"
                            value="{{isset($tenant) && $tenant->expires_at ? \Carbon\Carbon::parse($tenant->expires_at)->format('d/m/Y')  : ''}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="">Identificador:</label>
                        <input disabled type="text" class="form-control"
                            value="{{isset($tenant) && $tenant->subscription_id ? $tenant->subscription_id  : ''}}">
                    </div>
                </div>
            </div>

            <a href="" class="btn btn-rose btn-round">Atualizar Plano</a>
        </div>
    </div>
</div>

@endsection