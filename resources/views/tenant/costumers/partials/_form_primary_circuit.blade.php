<div class="row col-md-12">
    <div class="col-md-12">
        <div class="form-group">
            <label for="internet_plan_id" class="bmd-label-floating">
                Plano
                <span class="text-danger">*</span>
            </label>
            @php
                $aux = [];
                foreach($internetPlans as $eachInternetPlan) {
                    $aux[$eachInternetPlan->id] = $eachInternetPlan->name;
                }
            @endphp
            {!! Form::select('internet_plan_id', $aux, old('internet_plan_id'), ['class'=>'form-control selectpicker text-uppercase', 'id'=>'internet_plan_id', 'required', 'data-style' => "btn btn-link"]) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="auth_type" class="bmd-label-floating">
                Autentica&ccedil;&atilde;o
                <span class="text-danger">*</span>
            </label>
            @php
                $aux = [];
                $aux['pppoe'] = 'PPPoE';
            @endphp
            {!! Form::select('auth_type', $aux, old('auth_type'), ['class'=>'form-control selectpicker text-uppercase', 'id'=>'auth_type', 'required', 'data-style' => "btn btn-link"]) !!}
        </div>
    </div>

    {{--<div class="col-md-12">
        <div class="form-group">
            <label for="number" class="bmd-label-floating">
                Status
                <span class="text-danger">*</span>
            </label>
            @php
                $aux = [];
                $aux[] = 'Ativo (com acesso &agrave; internet)';
                $aux[] = 'Ativo (cortar acesso)';
            @endphp
            {!! Form::select('auth_type', $aux, old('auth_type'), ['class'=>'form-control selectpicker text-uppercase', 'id'=>'auth_type', 'required', 'data-style' => "btn btn-link"]) !!}
        </div>
    </div>--}}

    <div class="col-md-12">
        <div class="form-group">
            <label for="internet_plan_id" class="bmd-label-floating">
                Pool
                <span class="text-danger">*</span>
            </label>
            @php
                $aux = [];
            @endphp
            @isset($pools)
            @php
                foreach($pools as $eachPool) {
                    $aux[$eachInternetPlan->id] = $eachInternetPlan->name;
                }
            @endphp
            @endisset
            {!! Form::select('internet_plan_id', $aux, old('internet_plan_id'), ['class'=>'form-control selectpicker text-uppercase', 'id'=>'internet_plan_id', 'required', 'data-style' => "btn btn-link"]) !!}
        </div>
    </div>

</div>


<script>

</script>