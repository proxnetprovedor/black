@csrf
<div class="col-md-6">
    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
        <label class="bmd-label-floating" for="name">Nome </label> <span style="color:#f5365c ">*</span>
        <input type="text" name="name" id="name"
            class="form-control  {{ $errors->has('name') ? 'has-danger' : '' }}" placeholder="Nome"
            value="{{ isset($profile) && $profile->name && !old('name') != null ? $profile->name  : old('name')  }}"
            autofocus>
        @if($errors->has('name'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{$errors->first('name')}}</strong>
        </span>
        @endif
    </div>
</div>

<div class="col-md-6">
    <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
        <label class="bmd-label-floating" for="description">Descrição</label> <span
            style="color:#f5365c ">*</span>
        <input type="text" name="description" id="description"
            class="form-control  {{ $errors->has('description') ? 'has-danger' : '' }}" placeholder="Descrição"
            value="{{ isset($profile) && $profile->description && !old('description') != null ? $profile->description  : old('description')  }}"
            v-mask="'###.###.###-##'">
        @if($errors->has('description'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{$errors->first('description')}}</strong>
        </span>
        @endif
    </div>
</div>