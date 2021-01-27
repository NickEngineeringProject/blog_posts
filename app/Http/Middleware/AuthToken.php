<?php

namespace App\Http\Middleware;

use App\Http\Controllers\API\Auth\AuthLogController;
use App\Models\AuthLog;
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

        $auth_token = $request->header('X-Auth-Token', null);

        if ($auth_token)
        {
            $token = AuthLog::find($auth_token);
            if (!$token)
                abort('401', 'Not token');
        }
        else
            abort('401', 'Not auth token');

        return [
            AuthLogController::invoke($auth_token),
            $next($request)
        ];
    }
}
