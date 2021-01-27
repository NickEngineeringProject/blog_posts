<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $uuid = Str::uuid()->toString();

        return User::insert(
            [
                'uuid'=> $uuid,
                'login' => $request->get('login'),
                'password' => Hash::make($request->get('password')),

                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'patronymic'=> $request->get('patronymic'),

                'photo' => $request->get('photo'),
                'token' => '',
            ]
        );
    }
}
