<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRegisteredBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()->business) {
            return redirect()->route('auth.business.create');
        }

        if ($request->user()->business && $request->user()->business->approval_status == 'pending') {
            toastr()->error('', 'Business Profile pending approval. Contact admin for details');
            return redirect()->route('welcome');
        }

        if ($request->user()->business && $request->user()->business->approval_status == 'rejected') {
            toastr()->error('', 'Business Profile rejected approval. Contact admin for details');
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
