<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($request->user()->hasRole($role)) {
            return $next($request);
        }

        return response()->view('errors', [
            'code' => 403,
            'message' => __('Anda tidak memiliki akses untuk mengakses halaman ini'),
        ]);
    }
}
