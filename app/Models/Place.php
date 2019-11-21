<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function credit()
    {
        return $this->hasMany('App\Models\Credit');
    }
}
