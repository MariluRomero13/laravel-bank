<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $primaryKey = 'id';
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'role_id');
    }
}
