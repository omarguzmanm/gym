<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                if ($user->hasRole('Super Administrador')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Administrador')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Nutriologo')) {
                    return redirect()->route('analisis');
                } elseif ($user->hasRole('Entrenador')) {
                    return redirect()->route('ejercicios');
                } elseif ($user->hasRole('Cliente')) {
                    return redirect()->route('miProgreso');
                }
                // Si el usuario no tiene un rol específico, puedes redirigirlo a una vista predeterminada
                // return redirect()->route('dashboard');
                return response('Usuario no identificado', 404);
            }
        }

        return $next($request);
    }
}
