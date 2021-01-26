<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuthLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'token',
        'user_uuid',
        'user_agent',
    ];

    protected $hidden = [
        'token',
    ];

    public function log() {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }
}
