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
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has("guru")) {
            $response = $next($request);
            return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        }

        $guru = Guru::find(Auth::id());
        if ($guru) {
            $response = $next($request);
            return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        }

        return redirect('/login/guru');
    }
}
