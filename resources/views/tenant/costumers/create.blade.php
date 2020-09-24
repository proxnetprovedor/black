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

        @include('tenant.costumers.partials._form_nav_tabs_navigation')

      </div>
      <div class="card-body">
        <form action="{{ route('costumers.store') }}" method="post" enctype="multipart/form-data"
          class="formValidation">
          @csrf
          @method('post')

          @include('tenant.costumers.partials._form_tab_content')
          <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success ">Salvar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
  @endsection