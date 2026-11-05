<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordGate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('gate_authenticated')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
