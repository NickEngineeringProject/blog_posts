<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, HasRolesAndPermissions;

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

    public function log() {
        return $this->hasMany(AuthLog::class, 'user_uuid', 'uuid');
    }

}
