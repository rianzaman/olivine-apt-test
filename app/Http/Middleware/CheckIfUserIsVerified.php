<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckIfUserIsVerified
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
        if(Auth::user()->id != null)
        {
            if(Auth::user()->email_verified_at != null && Auth::user()->status == "active" && Auth::user()->verification_token == null)
            {
                return $next($request);
            }
            return response()->view('backend.authorization_error.index');
        }
    }
}
