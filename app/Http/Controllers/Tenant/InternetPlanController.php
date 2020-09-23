<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateInternetPlan;
use App\Models\InternetPlan;
use App\Models\InternetPlanServer;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PEAR2\Net\RouterOS;

class InternetPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('planos-de-internet visualizar'), 403);

        $internetPlans = InternetPlan::latest()->paginate(15);
        /*echo '<pre>';
        var_dump($internetPlans);
        echo '<pre>';
        return;*/
        return view('tenant.internet-plan.index', compact('internetPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('planos-de-internet criar'), 403);

        $servers = Server::where('tenant_id', auth()->user()->tenant_id)->get();

        return view('tenant.internet-plan.create', ['servers' => $servers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * StoreUpdateInternetPlan
     */
    public function store(StoreUpdateInternetPlan $request)
    {
        abort_if(Gate::denies('planos-de-internet criar'), 403);

        $server = Server::find($request->server_id);
        if (!($server->tenant_id === auth()->user()->tenant_id)) {
            abort(403);
        }

        //dd($request->all());
        $iPlan = InternetPlan::create($request->all());

        // mover para InternetPlanServer::store
        // InternetPlanServer::create(['internet_plan_id' => $iPlan->id, 'server_id' => $server->id]);
        $iPlanServer = new InternetPlanServer();
        $iPlanServer->internet_plan_id = $iPlan->id;
        $iPlanServer->server_id = $server->id;
        $iPlanServer->save();

        try {
            $client = new RouterOS\Client($server->ip_address, $server->login, $server->password);
        } catch (Exception $e) {
            die('Unable to connect to the router.');
            //Inspect $e if you want to know details about the failure.
        }

        $addRequest = new RouterOS\Request('/ppp/profile/add');
        $addRequest->setArgument('name', $iPlan->name);
        $addRequest->setArgument('rate-limit', $iPlan->upload_rate . 'k/' . $iPlan->download_rate . 'k');
        $client->sendSync($addRequest);

        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano de Internet ' . $iPlan->value . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function show(InternetPlan $internetPlan)
    {
        abort_if(Gate::denies('planos de internet visualizar'), 403);

        return view('tenant.internet-plan.show', compact('internetPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(InternetPlan $internetPlan)
    {
        //dd($internetPlan);
        abort_if(Gate::denies('planos-de-internet editar'), 403);

        $servers = Server::where('tenant_id', auth()->user()->tenant_id)->get();

        return view('tenant.internet-plan.edit', compact('internetPlan', 'servers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternetPlan $internetPlan)
    {
        abort_if(Gate::denies('planos-de-internet editar'), 403);

        if (!($internetPlan->tenant_id === auth()->user()->tenant_id)) {
            abort(403);
        }
        $server = Server::find($request->server_id);

        try {
            $client = new RouterOS\Client($server->ip_address, $server->login, $server->password);
        } catch (Exception $e) {
            die('Unable to connect to the router.');
            //Inspect $e if you want to know details about the failure.
        }

        /*$internetPlanServers = InternetPlanServer::where('internet_plan_id', $internetPlan->id)->get();
            //->where('server_id', $server->id)->count();
        foreach ($internetPlanServers as $eachInternetPlanServer) {
            if ( $eachInternetPlanServer->server_id !== $server->id ) {
                $addRequest = new RouterOS\Request('/ppp/profile/print');
                $responses = $client->sendSync($addRequest);
                foreach ($responses as $each) {
                    if ( $each->getProperty('name') === $internetPlan->name) {
                        $addRequest = new RouterOS\Request('/ppp/profile/remove');
                        $addRequest->setArgument('.id', $each->getProperty('.id'));
                        $addRequest->setArgument('name', $request->name);
                        $addRequest->setArgument('rate-limit', $request->upload_rate . 'k/' . $request->download_rate . 'k');
                        $client->sendSync($addRequest);
                        break;
                    }
                }
            }
        }*/

        $addRequest = new RouterOS\Request('/ppp/profile/print');
        $responses = $client->sendSync($addRequest);
        foreach ($responses as $each) {
            if ( $each->getProperty('name') === $internetPlan->name) {
                $addRequest = new RouterOS\Request('/ppp/profile/set');
                $addRequest->setArgument('.id', $each->getProperty('.id'));
                $addRequest->setArgument('name', $request->name);
                $addRequest->setArgument('rate-limit', $request->upload_rate . 'k/' . $request->download_rate . 'k');
                $client->sendSync($addRequest);
                break;
            }
        }

        $internetPlan->update($request->all());
        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano ' . $internetPlan->price . ' atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternetPlan $internetPlan)
    {
        abort_if(Gate::denies('planos-de-internet deletar'), 403);

        //dd("es");
        //$cto->instalations()->delete();
        $internetPlan->delete();

        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano ' . $internetPlan->name . ' excluído com sucesso !');
    }
}
