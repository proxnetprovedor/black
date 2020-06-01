@extends('layouts.admin')


@section('content')
<div class="col-md-12">
    <div class="card">
        @include('layouts.components._card-header', 
        [
        'icon'=>'assignment', 'tittle'=>"Planos do perfil $profile->name", 
        'button'=>['active'=>true, 'tittle'=>'Voltar', 'route'=>route('profiles.index')]
        ])
        <div class="card-body">
            <form action="{{ route('profiles.plans.sync', $profile) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="plans" class="bmd-label-floating">Permissões *</label>
                    <br>
                    @foreach ($plans as $plan)
                    <div class="custom-control custom-checkbox custom-control-inline mb-2">
                        <input id="{{$plan->id}}" name="plan[]" class="custom-control-input" type="checkbox"
                            value="{{ $plan->id }}"
                            {{ (in_array($plan->id, old('plan', [])) || isset($profile) && $profile->plans()->pluck('id')->contains($plan->id)) ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="{{$plan->id}}">{{ $plan->name }}</label>
                    </div>
                    @endforeach
                    @if($errors->has('plan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plan') }}
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