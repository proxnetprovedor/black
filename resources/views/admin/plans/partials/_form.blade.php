<div class="pl-lg-4">
    <div class="row">
        @csrf
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="name">Nome </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="name" id="name"
                    class="form-control  {{ $errors->has('name') ? 'has-danger' : '' }}" placeholder="Nome"
                    value="{{ isset($plan) && $plan->name && !old('name') != null ? $plan->name  : old('name')  }}"
                    autofocus>
                @if($errors->has('name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="description">Descrição</label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="description" id="description"
                    class="form-control  {{ $errors->has('description') ? 'has-danger' : '' }}" placeholder="Descrição"
                    value="{{ isset($plan) && $plan->description && !old('description') != null ? $plan->description  : old('description')  }}"
                    v-mask="'###.###.###-##'">
                @if($errors->has('description'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('description')}}</strong>
                </span>
                @endif
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group {{ $errors->has('price') ? 'has-danger' : '' }}">
                <label class="bmd-label-floating" for="price">Preço </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="price" id="price"
                    class="form-control  {{ $errors->has('price') ? 'has-danger' : '' }}" placeholder="preço"
                    value="{{ isset($plan) && $plan->price && !old('price') != null ? $plan->price  : old('price')  }}"
                    autofocus>
                @if($errors->has('price'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('price')}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-12">


            <div class="form-group">
                <label for="profiles" class="bmd-label-floating">Perfis de acesso *</label>
                <br>
                @foreach ($profiles as $id => $profile)
                <div class="custom-control custom-checkbox custom-control-inline mb-2">
                    <input id="{{$id}}" name="profile[]" class="custom-control-input" type="checkbox" value="{{ $id }}"
                        {{ (in_array($id, old('profiles', [])) || isset($role) && $role->profiles()->pluck('name', 'id')->contains($id)) ? 'checked' : ''  }}>
                    <label class="custom-control-label" for="{{$id}}">{{ $profile }}</label>
                </div>
                @endforeach
                @if($errors->has('profile'))
                <em class="invalid-feedback">
                    {{ $errors->first('profile') }}
                </em>
                @endif

            </div>
        </div>




    </div>

</div>