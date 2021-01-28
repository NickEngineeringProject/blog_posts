<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\Auth\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
   public static function upload($imgFile) {
       $fileName = Str::random(32) . "." . $imgFile->extension();
       $imgFile->storeAs('uploads', $fileName, 'public');
       return $fileName;
   }
}
