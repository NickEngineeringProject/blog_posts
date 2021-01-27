<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PhotoController extends Controller
{
   public function upload(Request $request) {

       if( $request->hasFile('image')) {
           $path = $request->file('image')
               ->store('uploads', 'public');
           return view('photo', ['path' => $path]);
       }
       return Response::json(['message' => 'error'], 200);
   }
}
