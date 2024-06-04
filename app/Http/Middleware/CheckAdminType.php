<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRoleType
{
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié
        if (Auth::check()) {
            // Vérifie si l'utilisateur a le rôle "sous_admin" ou "super_admin"
            if (Auth::guard('sous_admin')->check() || Auth::guard('super_admin')->check()) {
                return $next($request);
            }
        }

        // Redirige l'utilisateur vers une page non autorisée s'il n'a pas le bon rôle
        return redirect()->route('unauthorized');
    }
}
