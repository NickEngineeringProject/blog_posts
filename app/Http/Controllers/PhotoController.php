<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class PhotoController extends Controller
{
   public static function upload($imgFile) {
       $fileName = Str::random(32) . "." . $imgFile->extension();
       $imgFile->storeAs('uploads', $fileName, 'public');
       return $fileName;
   }
}
