<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function creditBureau()
    {
        return $this->hasOne('App\Models\CreditBureau');
    }

    public function card()
    {
        return $this->hasMany('App\Models\Card');
    }

    public function credit()
    {
        return $this->hasMany('App\Models\Credit');
    }

    public function loan()
    {
        return $this->belongsTo('App\Models\Loan');
    }
}
