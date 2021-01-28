<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $photo
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();

        $photo = PhotoController::upload($request);

        return User::insert([
                'uuid'=> $uuid,
                'login' => $request->get('login'),
                'password' => Hash::make($request->get('password')),
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'patronymic'=> $request->get('patronymic'),
                'photo' => $photo,
                'role' => $request->get('role', 'user'),
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: переписать update
        $user = User::findOrFail($id);

        $uuid = Str::uuid()->toString();

        $user->update([
            'uuid'=> $uuid,
            'login' => $request->get('login'),
            'password' => Hash::make($request->get('password')),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'patronymic'=> $request->get('patronymic'),
            'photo' => $request->get('photo'),
            'role' => $request->get('role', 'user'),
        ]);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}
