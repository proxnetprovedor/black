<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Models\Permission;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('perfis-de-usuario visualizar'), 403);

        $roles = Role::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('perfis-de-usuario criar'), 403);

        $permissions = Permission::latest()->get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        abort_if(Gate::denies('perfis-de-usuario criar'), 403);

        $role = Role::create($request->except('permission'));

        $permissions = $request->input('permission') ? $request->input('permission') : [];

        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index')->with('success', 'Perfil de acesso criado com sucesso !');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('perfis-de-usuario editar'), 403);

        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        abort_if(Gate::denies('perfis-de-usuario editar'), 403);

        // somente super admin pode editar o perfil de administrador, porém seu nome não pode ser alterado
        if ($role->name == Role::ADMIN && !(auth()->user()->isAdmin())) {
            abort(403, 'O perfil de Administrador não pode ser editado !');
        }

        $role->name == Role::ADMIN  ?  $request->request->remove('name')  : '';

        $role->update($request->except('permission'));

        $permissions = $request->input('permission') ? $request->input('permission') : [];

        $role->permissions()->sync($permissions);

        return redirect()->route('roles.edit', [$role->id])->with('success', 'Perfil de acesso atualizado com sucesso');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('perfis-de-usuario visualizar'), 403);

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('perfis-de-usuario deletar'), 403);

        if ($role->name == Role::ADMIN ) {
            abort(403, 'O perfil de Administrador não pode ser DELETADO !');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Perfil de acesso deletado com sucesso !');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
