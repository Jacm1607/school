<?php

use App\Privilegio;
use App\Providers\RouteServiceProvider;

function priv($privilegio, $redirect = true) {
    $rolId = session()->get('roles');
    $privilegios = cache()->tags('Privilegio')->rememberForever("Privilegio.rolid.".serialize($rolId), function () {
        return Privilegio::whereHas('roles', function ($query) {
            $query->where('idRol', session()->get('roles'));
        })->where('estado',1)->get()->pluck('slug')->toArray();
    });
    // dd($privilegios);
    if (!in_array($privilegio, $privilegios)) {
        if ($redirect) {
            if (!request()->ajax())
                return redirect(RouteServiceProvider::HOME)->send();
            abort(403, 'No tiene privilegio');
        } else {
            return false;
        }
    }
    return true;
}
