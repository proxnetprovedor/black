<div class="pl-lg-4">
    <div class="row">
        @csrf
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                <label class="bmd-label-floating" for="name">Nome </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="name" id="name"
                    class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    placeholder="Nome"
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
            <div class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
                <label class="bmd-label-floating" for="description">Descrição</label> <span
                    style="color:#f5365c ">*</span>
                <input type="text" name="description" id="description"
                    class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    placeholder="Descrição"
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
            <div class="form-group {{ $errors->has('price') ? 'is-invalid' : '' }}">
                <label class="bmd-label-floating" for="price">Preço </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="price" id="price"
                    class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}"
                    placeholder="preço"
                    value="{{ isset($plan) && $plan->price && !old('price') != null ? $plan->price  : old('price')  }}"
                    autofocus>
                @if($errors->has('price'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('price')}}</strong>
                </span>
                @endif
            </div>
        </div>






    </div>

</div>