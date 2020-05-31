<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::latest()->get();

        return view('admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProfile  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        $profile = Profile::create($request->all());

        return redirect()->route('profiles.index')->with('success', 'Perfil criado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('admin.profiles.show', compact('profile'));
    }


    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateProfile $request, Profile $profile)
    {
        $profile->update($request->all());

        return redirect()->route('profiles.index')->with('success', 'Perfil editado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {

        if ($profile->permissions->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'O perfil ' . $profile->name . ' possui permissões vinculadas . Por favor, desvincule as informações primeiro para depois excluir o perfil !');
        }

        if ($profile->plans->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'O perfil ' . $profile->name . ' possui planos vinculadas . Por favor, desvincule as informações primeiro para depois excluir o perfil !');
        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'O perfil ' . $profile->name . ' foi deletado com sucesso !');
    }
}
