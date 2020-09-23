<?php

namespace App\Http\Controllers\Tenant;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PEAR2\Net\RouterOS;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('servidores criar'), 403);

        $server = Server::create($request->all());
        return redirect()->route('servers.index')
            ->with('success', 'Servidor ' . $server->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Server $server
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
     * @param \App\Models\Server $server
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Server $server
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
     * @param \App\Models\Server $server
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

    /**
     * Get info direct of server.
     *
     * @param int $info
     * @return array
     */
    public function info($id)
    {
        abort_if(Gate::denies('servidores visualizar'), 403);

        $server = Server::find($id);
        if (!($server->tenant_id === auth()->user()->tenant_id)) {
           abort(403);
        }

        try {
            $client = new RouterOS\Client($server->ip_address, $server->login, $server->password);
        } catch (Exception $e) {
            die('Unable to connect to the router.');
            //Inspect $e if you want to know details about the failure.
        }

        $addRequest = new RouterOS\Request('/system/resource/print');
        //$addRequest->setArgument('proplist', 'version,cpu,cpu-frequency,cpu-load,uptime,free-memory,free-hdd-space,total-hdd-space,total-memory,board-name,cpu-count,');
        $responses = $client->sendSync($addRequest);
        $response = $responses[0];

        $addRequest = new RouterOS\Request('/ppp/active/print');
        //$addRequest->setArgument('proplist', 'version,cpu,cpu-frequency,cpu-load,uptime,free-memory,free-hdd-space,total-hdd-space,total-memory,board-name,cpu-count,');
        $responses = $client->sendSync($addRequest);

        $ppp_actives = 0;
        foreach ($responses as $each) {
            if ( $each->getType() === RouterOS\Response::TYPE_FINAL) {
                continue;
            }
            $ppp_actives++;
        }

        return json_encode([
            'uptime' => $response->getProperty('uptime'),
            'version' => $response->getProperty('version'),
            'build-time' => $response->getProperty('build-time'),
            'factory-software' => $response->getProperty('factory-software'),
            'free-memory' => $response->getProperty('free-memory'),
            'total-memory' => $response->getProperty('total-memory'),
            'cpu' => $response->getProperty('cpu'),
            'cpu-count' => $response->getProperty('cpu-count'),
            'cpu-frequency' => $response->getProperty('cpu-frequency'),
            'cpu-load' => $response->getProperty('cpu-load'),
            'free-hdd-space' => $response->getProperty('free-hdd-space'),
            'total-hdd-space' => $response->getProperty('total-hdd-space'),
            'architecture-name' => $response->getProperty('architecture-name'),
            'board-name' => $response->getProperty('board-name'),
            'platform' => $response->getProperty('platform'),
            'ppp_actives' => $ppp_actives,
        ]);
    }

    /**
     * Print on screen profiles returned of server.
     *
     * @param int $info
     * @return array
     */
    public function profiles($id)
    {
        $server = Server::find($id);
        if (!($server->tenant_id === auth()->user()->tenant_id)) {
            abort(403);
        }

        try {
            $client = new RouterOS\Client($server->ip_address, $server->login, $server->password);
        } catch (Exception $e) {
            die('Unable to connect to the router.');
            //Inspect $e if you want to know details about the failure.
        }

        //$addRequest = new RouterOS\Request('/ppp/secret/print');
        //$addRequest = new RouterOS\Request('/ppp/active/print');
        //$addRequest = new RouterOS\Request('/ppp/profile/print');
        //$addRequest = new RouterOS\Request('/ppp/profile/remove');
        //$addRequest->setArgument('.id', '*30');
        //$addRequest->setArgument('name', 'Especial - BlackRoute');
        //$addRequest->setArgument('rate-limit', '60000k/100000k');
        $responses = $client->sendSync($addRequest);
        foreach ($responses as $each) {
            echo '<pre>';
            //var_dump($each->getProperty('name'));
            var_dump($each);
            echo '<pre>';
        }

        return 0;
    }
}
