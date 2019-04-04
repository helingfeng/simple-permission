<?php

namespace SimplePermission\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permission
{
    public function handle($request, Closure $next, $permission)
    {
        $permissions = explode('|', $permission);
        $config_permissions = Auth::guard(config('permission.guard'))->user()->allPermission()->toArray();
        if (!collect($permissions)->first(function ($value) use ($config_permissions) {
            return in_array($value, $config_permissions);
        })) {
            return response('access deny.');
        }

        return $next($request);
    }
}
