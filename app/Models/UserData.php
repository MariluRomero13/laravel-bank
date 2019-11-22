<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'status'
    ];
}
