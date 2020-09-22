<div class="pl-lg-4">
    <div class="row">
        @csrf
        <div class="col-md-6">
            <div class="form-group  label-floating {{ $errors->has('name') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="name">Nome </label> <span style="color:#f5365c ">*</span>
                <input type="text" name="name" id="name"
                    class="form-control form-control-sm {{ $errors->has('name') ? 'has-danger' : '' }}"
                    placeholder="Nome"
                    value="{{ isset($detail) && $detail->name && !old('name') != null ? $detail->name  : old('name')  }}"
                    autofocus>
                @if($errors->has('name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
                @endif
            </div>
        </div>

    </div>

</div>