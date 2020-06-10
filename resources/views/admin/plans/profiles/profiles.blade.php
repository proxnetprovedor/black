@extends('layouts.admin')


@section('content')
<div class="col-md-12">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">Perfis do plano <strong>{{ $plan->name }} </strong></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('plans.index')}}" class="btn btn-sm btn-primary">Voltar
                        para a lista</a>

                </div>
            </div>

        </div>
        <div class="card-body">
            <form action="{{ route('plans.profiles.sync', $plan) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="profiles" class="bmd-label-floating">Perfis *</label>
                    <br>
                    @foreach ($profiles as $profile)
                    <div class="custom-control custom-checkbox custom-control-inline mb-2">
                        <input id="{{$profile->id}}" name="profile[]" class="custom-control-input" type="checkbox"
                            value="{{ $profile->id }}"
                            {{ (in_array($profile->id, old('profile', [])) || isset($plan) && $plan->profiles()->pluck('id')->contains($profile->id)) ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="{{$profile->id}}">{{ $profile->name }}</label>
                    </div>
                    @endforeach
                    @if($errors->has('profile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </em>
                    @endif

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection