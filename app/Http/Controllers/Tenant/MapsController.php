<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Ctos;
use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MapsController extends Controller
{
    public function localizacao() {
        $ctos = Ctos::all();
        return response()->json([
            'data' => $ctos,
            'message' => 'creditos'
            ], 200);
    }
    public function servers() {
        $servers = Server::all();
        return \response()->json([
            'data' => $servers,
            'message'=> 'servers'
        ], 200);
    }
}
