@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    @include('_flash_messages')

    <div class="card">
        @include('layouts.components._card-header', 
        [
        'icon'=>'assignment', 'tittle'=>"Novo Perfil de acesso (Provedores)", 
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('profiles.index')]
        ])
        <div class="card-body">
            <form method="POST" action="{{route('profiles.store')}}" autocomplete="off" enctype="multipart/form-data">
                @include('admin.profiles.partials._form')
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection