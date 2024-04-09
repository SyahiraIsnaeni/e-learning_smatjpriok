<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use App\Models\Siswa;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyTeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has("guru")) {
            return $next($request);
        }

        $guru = Guru::find(Auth::id());
        if ($guru) {
            return $next($request);
        }

        return redirect('/login/guru');
    }
}
