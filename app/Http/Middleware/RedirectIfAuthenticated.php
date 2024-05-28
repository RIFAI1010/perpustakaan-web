<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->check()) {
            // Pengguna sudah login, alihkan ke halaman dashboard atau halaman lainnya
            return redirect('/dashboard'); // Ganti '/dashboard' dengan rute yang sesuai
        }

        return $next($request);
    }
}
