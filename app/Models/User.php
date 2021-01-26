<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'patronymic',
        'login',
        'photo',
        'password'
    ];

    protected $hidden = [
      'password',
    ];
}
