<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        $this->middleware('can:edit_post');
        $uuid = Str::uuid()->toString();

        $user_uuid = $request->get('user_uuid');
        $users = User::where('uuid', '=', $user_uuid)->first();

        if (is_null($users))
            return Response::json(['user' => 'not found'], 404);

        if ($request->hasFile('image')) {
            $photo = PhotoController::upload($request->file('image'));
        }
        else abort(404);

        return Article::insert([
            'uuid' => $uuid,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'photo' => $photo ?? null,
            'user_uuid' => $users->uuid,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Article::findOrFail($id);
        return $post;
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
        $article = Article::findOrFail($id);
        $article->update($request->only(['title', 'description']));
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
    }
}
