@extends('layouts.admin')

@section('title','Clientes')


@section('content')

<div class="container-fluid mt--6">

  <div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('costumers.index')}}">Clientes</a></li>
        <li class="breadcrumb-item active"><a href="{{route('costumers.create')}}">Novo</a></li>
      </ol>
    </nav>

    @include('_flash_messages')
    <div class="card">
      <div class="card-header card-header-tabs card-header-rose">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            {{-- <span class="nav-tabs-title">Cliente</span> --}}
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#personal" data-toggle="tab">
                  <i class="material-icons">personal</i> Dados Pessoais
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#address" data-toggle="tab">
                  <i class="material-icons">code</i> Endereço
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#primary" data-toggle="tab">
                  <i class="material-icons">cloud</i>Circuito Primário
                  <div class="ripple-container"></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">

          {{-- Dados Pessoais --}}
          <div class="tab-pane active" id="personal">
            {!! Form::open() !!}
            {!! Form::token() !!}

            @include('tenant.costumers.partials._form_personal')

            {!! Form::close() !!}
          </div>

          {{-- Endereço --}}
          <div class="tab-pane" id="address">
            {!! Form::open() !!}
            {!! Form::token() !!}
            @include('tenant.costumers.partials._form_address')
            {!! Form::close() !!}
          </div>

          {{-- Circuito Primario --}}
          <div class="tab-pane" id="primary">
          </div>
        </div>
      </div>

      <!--  end card  -->
    </div>
  </div>
  @endsection

  @section('scripts_after_body')
  <script>
    $('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY',
      locale: moment.locale('pt-br'),
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

  </script>

  @endsection