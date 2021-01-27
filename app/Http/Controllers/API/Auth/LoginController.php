<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\Auth\AuthLogController;
use App\Http\Controllers\Controller;
use App\Models\AuthLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(User $user, Request $request) {

        $user = User::where('login', '=', $request->get('login'))->firstOrFail(['uuid', 'password']);

        if (!Hash::check($request->get('password'), $user->password)) return Response()->json(['User not found'], 404);

        return AuthLogController::invoke($user->uuid, $request->header('user-agent'));

        AuthLog::select('token', 'uuid');

    }
}
