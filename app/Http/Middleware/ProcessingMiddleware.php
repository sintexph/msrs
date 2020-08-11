<?php

namespace App\Http\Middleware;

use Closure;

class ProcessingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $serviceRequest = $request->serviceRequest;

        if(auth()->user()->isAdmin != 1)
        {
            return redirect()->back();
        }

        if($serviceRequest->status == 'Processing')
        {
            abort(422, 'Error processing');
        }

        return $next($request);
    }
}
