<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        $user = Auth::user();

        if($user && strtolower($user->statut) === 'actif' || strtolower($user->statut) === '') {
            return $next($request);
        }
        return redirect()->route('auth.invalid_statut');
        // return redirect('vous n\'est pas actif');
    }
}
