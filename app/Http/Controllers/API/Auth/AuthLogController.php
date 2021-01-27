<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthLog;
use Illuminate\Support\Str;

class AuthLogController extends Controller
{
    public static function invoke($uuid, $agent) {
        $str_rand = Str::random(32);
        $token = sha1($str_rand);
        try {
            AuthLog::insert([
                'user_uuid' => $uuid,
                'user_agent' => $agent,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return Response()->json(["Error 500", $e->getMessage()], 500);
        }

        return Response()->json(["token" => $str_rand], 200);

    }
}
