<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkPrice
{
    public function handle(Request $request, Closure $next): Response
    {
        if( $request->price > 100 )
            return redirect('home');

        return $next($request);
    }
}
