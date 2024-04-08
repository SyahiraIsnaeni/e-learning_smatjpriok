<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use App\Models\Siswa;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guru = Siswa::find(auth()->id());

        if ($guru && $request->session()->exists("student")) {
            return $next($request);
        }

        return redirect('/login-siswa');
    }
}
