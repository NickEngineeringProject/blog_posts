<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

//    const PATH_TO_USER_IMAGE_STORE = "/uploads/";

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'login',
        'photo',
        'password',
        'role'
    ];

    protected $hidden = [
      'password',
    ];

//    public static function getPhotoAttribute($path)
//    {
//        return $photo = url("/storage" . self::PATH_TO_USER_IMAGE_STORE . $path);
//    }
}
