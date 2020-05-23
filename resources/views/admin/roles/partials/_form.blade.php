<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Perfil de Acesso *</label>
    <input type="text" id="name" name="name" class="form-control"
        value="{{ old('name', isset($role) ? $role->name : '') }}" required>
    @if($errors->has('name'))
    <em class="invalid-feedback">
        {{ $errors->first('name') }}
    </em>
    @endif

</div>

<div class="form-group">
    <label for="permissions">Permissões *</label>
    <br>
    @foreach ($permissions as $id => $permissions)
    <div class="custom-control custom-checkbox custom-control-inline mb-2">
        <input id="{{$id}}" name="permission[]" class="custom-control-input" type="checkbox" value="{{ $id }}"
            {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'checked' : ''  }}>
        <label class="custom-control-label" for="{{$id}}">{{ $permissions }}</label>
    </div>
    @endforeach
    @if($errors->has('permissions'))
    <em class="invalid-feedback">
        {{ $errors->first('permissions') }}
    </em>
    @endif

</div>