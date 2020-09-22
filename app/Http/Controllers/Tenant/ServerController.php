<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Gate;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('servidores visualizar'), 403);

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
        abort_if(Gate::denies('servidores criar'), 403);


        return view('tenant.servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('servidores criar'), 403);

        $server = Server::create($request->all());
        return redirect()->route('ctos.index')
            ->with('success', 'Servidor ' . $server->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        abort_if(Gate::denies('servidores visualizar'), 403);

        $internetPlans = $server->internetPlans;
        // dd($server);

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
        abort_if(Gate::denies('servidores editar'), 403);

        return view('tenant.servers.edit', compact('server'));
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
        abort_if(Gate::denies('servidores editar'), 403);

        $server->update($request->all());

        // dd($request->all());
        return redirect()->route('servers.index')
            ->with('success', 'Servidor ' . $server->name . 'atualizado com sucesso !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        abort_if(Gate::denies('servidores deletar'), 403);
        // dd($server);
        $server->internetPlans()->detach();
        $server->delete();
        return redirect()->route('servers.index')
            ->with('success', 'Servidor ' . $server->name . ' excluído com sucesso !');
    }
}
