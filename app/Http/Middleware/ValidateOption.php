<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateOption
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $option = $request->input('option', 0);
        if ($option == 1) {
            return redirect()->route('listing.index')
                ->with('success', 'Option correct 1');
        } elseif ($option == 2) {
            return redirect()->route('page.hello')
                ->with('success', 'Option correct 2');
        }
        return $next($request);
    }
}
