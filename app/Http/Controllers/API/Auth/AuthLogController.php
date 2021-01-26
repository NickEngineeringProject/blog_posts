<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthLog;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthLogController extends Controller
{
    public static function invoke($uuid, $agent) {
        $str_rand = Str::random(32);
        $token = Hash::make($str_rand);
        try {
            AuthLog::insert([
                'user_uuid' => $uuid,
                'user_agent' => $agent,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return Response()->json(["Error 500", $e->getMessage()], 500);
        }

        return Response()->json(["token" => $token], 200);
    }
}
