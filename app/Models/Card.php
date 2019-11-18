<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function customer()
    {
        return $this->belongsToMany('App\Models\Curtomer')->withPivot([
            'status'
        ]);
    }
}
