<hr>
<h4 class="">Configurar senha</h4>
<br>

<div class="row">

    <div class="col-md-3">
        <div class="form-group  label-floating {{ $errors->has('password') ? 'has-danger' : '' }}">
            <label class="bmd-label-floating" for="password">Senha </label> <span style="color:#f5365c ">*</span>
            <input type="password" name="password" id="password"
                class="form-control  {{ $errors->has('password') ? 'has-danger' : '' }}"
                placeholder="Carga horária de Trabalho"
                {{-- value="{{ isset($employee) && $employee->user != null && !old('password') != null ? $employee->user->password  : old('password')  }}"
                --}} autofocus>
            @if($errors->has('password'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group  label-floating">
            <label class="bmd-label-floating" for="password_confirmation">Confirme a Senha </label> <span
                style="color:#f5365c ">*</span>
            <input placeholder="Confirme sua senha" id="password-confirm" type="password" class="form-control"
                name="password_confirmation" autocomplete="new-password">

        </div>

    </div>

</div>