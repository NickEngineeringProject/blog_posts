<?php

namespace App\Http\Middleware;

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

        $auth_token = $request->header('X-Auth-Token');

        if (is_null($auth_token)) return Response()->json(['token' => 'not found'],403);

        $token = AuthLog::where('token', '=', sha1($auth_token))->first('user_uuid');

        if (is_null($token)) return Response()->json(['token' => 'not found'],403);

        $request->request->add(["user" => $token]);

        return $next($request);
    }
}
