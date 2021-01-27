<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'roles',
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
