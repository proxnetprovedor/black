@extends('layouts.app', ['page' => 'Não autorizado !', 'class' => 'page-header error-page header-filter', 'url' =>
'../../assets/img/clint-mckoy.jpg'])

@section('content')
<div class="content-center">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">403</h1>
            <h2>Não autorizado :(</h2>
            <h4>Oooops! Parece que você não tem permissão para acessar essa página.</h4>
        </div>
    </div>
</div>
</div>




@endsection