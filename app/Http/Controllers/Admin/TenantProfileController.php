<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantProfileRequest;
use App\Models\Tenant;
use App\Rules\TenantUnique;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TenantProfileController extends Controller
{

    public function show(Tenant $tenant)
    {
        if (!($tenant->id === auth()->user()->tenant_id)) {
            abort(403);
        }

        return view('admin.tenants.profile.show', compact('tenant'));
    }

    public function update(TenantProfileRequest $request, Tenant $tenant)
    {

        if (!($tenant->id === auth()->user()->tenant_id)) {
            abort(403);
        }

        DB::transaction(function () use ($request, $tenant) {
            $attributes = $request->all();

            if ($request->hasFile('logo') && $request->logo->isValid()) {
                if (Storage::exists($tenant->logo)) {
                    Storage::delete($tenant->logo);
                }

                // persiste a imagem na pasta do tenant correspondente
                $attributes['logo'] = $request->logo->store("tenants/{$tenant->id}");
            }

            $tenant->update($attributes);
        });

        return redirect()->route('tenant.profile.show', $tenant)->with('success', 'Perfil atualizado com sucesso !');
    }
}
