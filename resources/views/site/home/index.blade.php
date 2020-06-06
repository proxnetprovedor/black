@extends('layouts.app', ['page' => 'Planos', 'class' => 'page-header pricing-page header-filter', 'url' =>
'../../assets/img/bg-pricing.jpg'])

@section('content')
<div class="row ">
    <div class="col-md-6 ml-auto mr-auto  text-center">
        <h2 class="title">Escolha o melhor plano para você</h2>
        <h5 class="description">Você terá atualizações gratuitas e suporte em qualquer plano</h5>
    </div>
</div>

<div class="row ">
    @foreach ($plans as $plan)
    <div class="col-lg-4 col-md-6">
        <div class="card card-pricing ">
            <h4 class="card-title"> {{ $plan->name }}</h4>
            <div class="card-body">
                {{-- <div class="card-icon icon-rose ">
                    <i class="material-icons">home</i>
                </div> --}}
                <h3 class="card-title">R$ {{ number_format($plan->price, 2, ',', '.') }} Por Mês</h3>
                <ul>
                    @foreach ($plan->details as $detail)
                    <li>{{ $detail->name }}</li>
                    @endforeach
                </ul>
                {{-- <p class="card-description">This is good if your company size is between 2 and 10 Persons.</p> --}}
            </div>
            <div class="card-footer justify-content-center ">
                <a href="{{ route('plan.subscription', $plan->url) }}" class="btn btn-round btn-rose">Assinar</a>
            </div>
        </div>
    </div>

    @endforeach
</div>




@endsection