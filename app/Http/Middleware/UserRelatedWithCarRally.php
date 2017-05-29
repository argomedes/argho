<?php

namespace App\Http\Middleware;

use Closure;

class UserRelatedWithCarRally
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
        if (! ($request->user()->car_rally_id == $request->carRally->id)) {
            return redirect('/');
        }

        return $next($request);
    }
}
