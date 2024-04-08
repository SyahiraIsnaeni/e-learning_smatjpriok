<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use Closure;
use Illuminate\Http\Request;
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
        $guru = Guru::find(auth()->id());

        if ($guru && $request->session()->exists("teacher")) {
            return $next($request);
        }

        return redirect('/login-guru');
    }
}
