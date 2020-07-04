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
             
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('costumers.store') }}" method="post" enctype="multipart/form-data" class="formValidation">
          @csrf
          @method('post')
         
          <div class="tab-content">

            {{-- Dados Pessoais --}}
            <div class="tab-pane active" id="personal">

              @include('tenant.costumers.partials._form_personal')
              
            </div>

            {{-- Endereço --}}
            <div class="tab-pane" id="address">
             
              @include('tenant.costumers.partials._form_address')

            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-block btn-success">Salvar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
  @endsection