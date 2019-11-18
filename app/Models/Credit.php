<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public function customer()
    {
        return $this->belongsToMany('App\Models\Customer');
    }
}
