<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $_auth_token = $request->header('X-Auth-Token', null);

        if ($_auth_token)
        {
            $_token = AuthToken::find($_auth_token);
            if (!$_token)
                abort('401', 'No such token. Request a new one.');
        }
        else
            abort('401', 'No auth token provided');

        return $next($request);
    }
}
