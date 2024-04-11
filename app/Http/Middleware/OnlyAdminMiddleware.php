<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Siswa;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has("admin")) {
            return $next($request);
        }

        $admin = Admin::find(Auth::id());
        if ($admin) {
            return $next($request);
        }

        return redirect('/login/admin');
    }
}
