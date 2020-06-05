<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::latest()->get();

        return view('tenant.servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tenant.servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        if(imOwner($server->tenant_id)) {
            return view ('tenant.servers.edit', compact('server'));
        } else {
            return redirect()->route('servers.index')
                ->with('error', 'O Servidor ' . $server->name . ' não pertence a sua Empresa !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        if(imOwner($server->tenant_id)) {
            $server->update($request->all());
            $servers = \myTenant()->servers;
            return redirect()->route('servers.index')
                ->with('succes', 'Servidor ' . $server->name . 'atualizado com sucesso !');
                
        } else {
            return redirect()->route('servers.index')
            ->with('error', 'O Servidor ' . $server->name . ' não pertence a sua Empresa !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        //
    }
}
