<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {

        if (!Auth::check() || Auth::user()->role !== $role) {
            // abort(403, 'Unauthorized action.');
            switch ($role) {
            case 'admin': {return redirect('/dashboard');}
            case 'staff': {return redirect('/dashboard_buku');}
            case 'siswa': {return redirect('/dashboard');}
                
        }
        }
        // switch ($role) {
        //     case 'admin': {}
        //     case 'staff': {}
        //     case 'siswa': {}
                
        // }
        // if (!Auth::check() || Auth::user()->role !== $role) {
        //     // abort(403, 'Unauthorized action.');
        //     return redirect('/dashboard');
        // }

        return $next($request);
    }
}