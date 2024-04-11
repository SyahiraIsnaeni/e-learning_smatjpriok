<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->exists("siswa")) {
            return redirect()->route('dashboard-siswa', ['id' => $request->session()->get("siswa")]);
        } elseif ($request->session()->exists("guru")) {
            return redirect()->route('dashboard-guru', ['id' => $request->session()->get("guru")]);
        }elseif ($request->session()->exists("admin")) {
            return redirect()->route('dashboard-admin');
        }

        return $next($request);
    }
}
