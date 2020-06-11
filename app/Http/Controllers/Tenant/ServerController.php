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
        $servers = Server::latest()->paginate(15);
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
        $server = Server::create($request->all());
        return redirect()->route('ctos.index')
            ->with('succes', 'Servidor ' . $server->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //dd($server);
        $internetPlans = $server->internetPlans;
        
        return view('tenant.servers.show', compact('server', 'internetPlans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        return view ('tenant.servers.edit', compact('server'));
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

        $server->update($request->all());
        return redirect()->route('servers.index')
            ->with('succes', 'Servidor ' . $server->name . 'atualizado com sucesso !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->back()->with('success', 'Servidor removido com sucesso!');
    }
}
