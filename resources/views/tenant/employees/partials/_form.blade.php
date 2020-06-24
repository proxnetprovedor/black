<div class="pl-lg-4">
    <div class="row">
        @csrf
        <div class="col-md-6">
            <div class="form-group  label-floating {{ $errors->has('name') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="name">Nome </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="name" id="name"
                    class="form-control  {{ $errors->has('name') ? 'has-danger' : '' }}" placeholder="Nome"
                    value="{{ isset($employee) && $employee->name && !old('name') != null ? $employee->name  : old('name')  }}"
                    autofocus>
                @if($errors->has('name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group   label-floating {{ $errors->has('function') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="function">Função</label> <span style="color:#f5365c ">*</span>
                <input type="text" name="function" id="function"
                    class="form-control  {{ $errors->has('function') ? 'has-danger' : '' }}" placeholder="Função"
                    value="{{ isset($employee) && $employee->function && !old('function') != null ? $employee->function  : old('function')  }}"
                    v-mask="'###.###.###-##'">
                @if($errors->has('function'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('function')}}</strong>
                </span>
                @endif
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group  label-floating {{ $errors->has('salary') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="salary">Remuneração </label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="salary" id="salary"
                    class="form-control  {{ $errors->has('salary') ? 'has-danger' : '' }}" placeholder="Remunereção"
                    value="{{ isset($employee) && $employee->salary && !old('salary') != null ? $employee->salary  : old('salary')  }}"
                    autofocus>
                @if($errors->has('salary'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('salary')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group  label-floating {{ $errors->has('cpf_cnpj') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="cpf_cnpj">CPF </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj"
                    class="form-control  {{ $errors->has('cpf_cnpj') ? 'has-danger' : '' }}" placeholder="CPF"
                    value="{{ isset($employee) && $employee->person != null && !old('cpf_cnpj') != null ? $employee->person->cpf_cnpj  : old('cpf_cnpj')  }}"
                    autofocus>
                @if($errors->has('cpf_cnpj'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('cpf_cnpj')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group  label-floating {{ $errors->has('working_hours') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="working_hours">Carga Horária </label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="working_hours" id="working_hours"
                    class="form-control  {{ $errors->has('working_hours') ? 'has-danger' : '' }}"
                    placeholder="Carga horária de Trabalho"
                    value="{{ isset($employee) && $employee->working_hours && !old('working_hours') != null ? $employee->working_hours  : old('working_hours')  }}"
                    autofocus>
                @if($errors->has('working_hours'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('working_hours')}}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <br>

    <hr>

    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group  label-floating {{ $errors->has('city') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="city">Cidade </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="city" id="city"
                    class="form-control  {{ $errors->has('city') ? 'has-danger' : '' }}" placeholder="Informe a cidade"
                    value="{{ isset($employee) && $employee->address != null && !old('city') != null ? $employee->address->city  : old('city')  }}"
                    autofocus>
                @if($errors->has('city'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('city')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group  label-floating {{ $errors->has('state') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="state">Estado </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="state" id="state"
                    class="form-control  {{ $errors->has('state') ? 'has-danger' : '' }}" placeholder="Informe o estado"
                    value="{{ isset($employee) && $employee->address != null && !old('state') != null ? $employee->address->state  : old('state')  }}"
                    autofocus>
                @if($errors->has('state'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('state')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group  label-floating {{ $errors->has('number') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="number">Numero </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="number" id="number"
                    class="form-control  {{ $errors->has('number') ? 'has-danger' : '' }}" placeholder="Numero"
                    value="{{ isset($employee) && $employee->address != null && !old('number') != null ? $employee->address->number  : old('number')  }}"
                    autofocus>
                @if($errors->has('number'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('number')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group  label-floating {{ $errors->has('neighborthood') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="neighborthood">Bairro </label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="neighborthood" id="neighborthood"
                    class="form-control  {{ $errors->has('neighborthood') ? 'has-danger' : '' }}" placeholder="Bairro"
                    value="{{ isset($employee) && $employee->address != null && !old('neighborthood') != null ? $employee->address->neighborthood  : old('neighborthood')  }}"
                    autofocus>
                @if($errors->has('neighborthood'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('neighborthood')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group  label-floating {{ $errors->has('address') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="address">Endereço </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="address" id="address"
                    class="form-control  {{ $errors->has('address') ? 'has-danger' : '' }}"
                    placeholder="Logradouro, rua, avenida, travessa .."
                    value="{{ isset($employee) && $employee->address != null && !old('address') != null ? $employee->address->address  : old('address')  }}"
                    autofocus>
                @if($errors->has('address'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('address')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group  label-floating {{ $errors->has('cep') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="cep">CEP </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="cep" id="cep"
                    class="form-control  {{ $errors->has('cep') ? 'has-danger' : '' }}" placeholder="Cep"
                    value="{{ isset($employee) && $employee->cep != null && !old('cep') != null ? $employee->cep->cep  : old('cep')  }}"
                    autofocus>
                @if($errors->has('cep'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('cep')}}</strong>
                </span>
                @endif
            </div>
        </div>





    </div>

    <br>

    <hr>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group  label-floating {{ $errors->has('email') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="email">Email de login </label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="email" id="email"
                    class="form-control  {{ $errors->has('email') ? 'has-danger' : '' }}"
                    placeholder="E-mail para efetuar login no sistema"
                    value="{{ isset($employee) && $employee->user != null && !old('email') != null ? $employee->user->email  : old('email')  }}"
                    autofocus>
                @if($errors->has('email'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
                @endif
            </div>
        </div>

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