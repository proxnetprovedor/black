<?php

use Illuminate\Support\Facades\Auth;


function imOwner($model_tenant_id){
    $user = Auth::user();
    $tenant = $user->tenant->first();
    if ($tenant->id == $model_tenant_id) {
        return true;
    } else {
        return false;
    }
}
function myTenant() {
    $user = Auth::user();
    $tenant = $user->tenant->first();
    return $tenant;
}

?>