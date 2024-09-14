<?php

namespace Sensiple\Blog\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Sensiple\Blog\App\Models\SeoManagement;
use Symfony\Component\HttpFoundation\Response;

class SeoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seo = SeoManagement::first();

        View::share('seo', $seo);
        return $next($request);
    }
}
