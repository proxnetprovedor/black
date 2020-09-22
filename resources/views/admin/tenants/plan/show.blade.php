@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tenant.profile.show', auth()->user()->tenant_id)}}">Perfil</a>
        </li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto text-center">
            <h2 class="title">Escolha o melhor plano para você</h2>
            <h5 class="description">Você terá atualizações gratuitas e suporte em qualquer plano.</h5>
        </div>
    </div>

    <div class="row">
        @foreach ($plans as $plan)
        <div class="col-lg-4 col-md-6">
            <div class="card card-pricing {{auth()->user()->tenant->plan->id == $plan->id ? 'card-plain' : ''}}">
                <h4 class="card-title"> {{auth()->user()->tenant->plan->id == $plan->id ? '(SEU PLANO)' : ''}}
                    {{ $plan->name }}</h4>
                <div class="card-body">
                    {{-- <div class="card-icon icon-rose ">
                        <i class="material-icons">home</i>
                    </div> --}}
                    <h3 class="card-title"> R$ {{ number_format($plan->price, 2, ',', '.') }} Por Mês</h3>
                    <ul>
                        @foreach ($plan->details as $detail)
                        <li>{{ $detail->name }}</li>
                        @endforeach
                    </ul>
                    {{-- <p class="card-description">This is good if your company size is between 2 and 10 Persons.</p> --}}
                </div>
                <div class="card-footer justify-content-center ">
                    <form action="{{ route('tenant.plan.update', [$tenant, $plan]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit"
                            onclick=" return confirm('Você tem certeza que deseja alterar o seu plano para o {{$plan->name}} ?' )"
                            class="btn btn-round btn-rose">Assinar</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection