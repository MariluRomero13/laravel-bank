<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function adress()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function creditBureau()
    {
        return $this->hasOne('App\Models\CreditBureau');
    }

    public function card()
    {
        return $this->belongsToMany('App\Models\Card')->withPivot([
            'status'
        ]);
    }
}
