@extends('layouts.admin')

@section('title','Formulario')


@section('content')
<div class="container-fluid mt--6">
    @include('_flash_messages')
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3> Detalhes o <strong> {{$plan->name}} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('plans.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $plan->description }}
                </li>
                <li>
                    <strong>Valor:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <hr>
                <li>
                    <strong>Restaurantes :</strong> Total de ... estabelecimentos
                </li>
                <hr>
                <strong>Detalhes vinculados:</strong>
                @foreach ($plan->details as $detail)
                    <li> {{$detail->name}} </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('plans.destroy', $plan) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Você realmente deseja deletar o plano {{$plan->name}} ?')">Deletar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection