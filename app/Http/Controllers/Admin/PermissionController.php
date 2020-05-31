<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
     /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::latest()->paginate(8);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        return view('admin.permissions.create');
    }

    
    public function store(Request $request)
    {
        $permission = Permission::create($request->except('permission'));
       

        return redirect()->route('permissions.index')->with('success', 'Perfil de acesso criado com sucesso !');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
      

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        $permission->update($request->all());
      

        return redirect()->route('permissions.index')->with('success', 'Perfil de acesso atualizado com sucesso !');
    }

    public function show(Permission $permission)
    {

        $permission->load('roles');

        return view('admin.permissions.show', compact('permission'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permissão deletada com sucesso !');
    }

}
