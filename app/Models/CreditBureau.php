<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditBureau extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function credit()
    {
        return $this->hasMany('App\Models\Credit');
    }
}
