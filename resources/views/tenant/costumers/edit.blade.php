@extends('layouts.admin')

@section('title','Provedoras')

@section('content')

<div class="container-fluid mt--6">

  <div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('costumers.index')}}">Clientes</a></li>
        <li class="breadcrumb-item active"><a href="#">Detalhes</a></li>
      </ol>
    </nav>
    @include('_flash_messages')
    <div class="card">
      <div class="card-header card-header-tabs card-header-rose">
        <div class="d-flex justify-content-end">
          <a rel="tooltip" class="btn btn-success btn-link btn-sm" data-original-title="Novo Cliente"
            href="/tenant/costumers/create">
            <i class="material-icons text-white">add</i>
            <div class="ripple-container"></div>
          </a>
          <a type="submit" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-toggle="modal"
            data-target="#deleteCostumerModal" data-original-title="Excluir Cliente">
            <i class="material-icons text-white">close</i>
            <div class="ripple-container"></div>
          </a>
        </div>

        @include('tenant.costumers.partials._form_nav_tabs_navigation')
      </div>
      <div class="card-body">
        <form action="{{ route('costumers.update', $costumer->id) }}" method="post" enctype="multipart/form-data"
          class="formValidation">
          @csrf
          @method('put')
          @include('tenant.costumers.partials._form_tab_content')
          <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  @include('tenant.costumers.modals.confirm_delete_modal')

  @endsection

  