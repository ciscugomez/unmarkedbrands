<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Redirection as ModelsRedirection;

class Redirection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->url();

        try {
            $redirection    = ModelsRedirection::where('from', $url)->orderBy('created_at', 'desc')->firstOrFail();
            $code           = 301;

            return redirect($redirection->to, 301);
        } catch (\Exception $e) {
            return $next($request);
        }
    }
}
