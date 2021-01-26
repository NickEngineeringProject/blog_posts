<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remember extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_uuid',
        'user_agent',
        'token',
    ];

    protected $hidden = [
        'token',
    ];
}
