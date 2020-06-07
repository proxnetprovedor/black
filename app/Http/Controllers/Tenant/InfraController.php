<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Instalation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class InfraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instalations = Instalation::latest()->paginate(15);
        return view('tenant.index', compact('instalations'));
    }
}
