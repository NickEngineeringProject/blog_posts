<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(User $user, Request $request) {

        $user = User::where('login', $request->get('login'))
            ->where('password', $request->get('password'))
            ->first();

        $token = md5($user->uuid . date('Y-m-d H:i:s'));

        $user->token = $token;

        $user->save();

        return $token;

    }
}
