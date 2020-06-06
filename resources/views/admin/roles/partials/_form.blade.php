<div class="col-md-6">


    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
        <label for="name" class="bmd-label-floating">Perfil de Acesso *</label>
        <input type="text" id="name" name="name" class="form-control"
            value="{{ old('name', isset($role) ? $role->name : '') }}" required>
        @if($errors->has('name'))
        <em class="invalid-feedback">
            {{ $errors->first('name') }}
        </em>
        @endif

    </div>

</div>
<div class="form-group">
    <label for="permissions" class="bmd-label-floating">Permissões *</label>
    <br>
    @foreach ($permissions as $permission)
    <div class="custom-control custom-checkbox custom-control-inline mb-2">
        <input id="{{$permission->id}}" name="permission[]" class="custom-control-input" type="checkbox" value="{{ $permission->id }}"
            {{ (in_array($permission->id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('id')->contains($permission->id)) ? 'checked' : ''  }}>
        <label class="custom-control-label" for="{{$permission->id}}">{{ $permission->name }}</label>
    </div>
    @endforeach
    @if($errors->has('permissions'))
    <em class="invalid-feedback">
        {{ $errors->first('permissions') }}
    </em>
    @endif

</div>