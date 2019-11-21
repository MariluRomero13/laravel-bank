<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function customer()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function credit()
    {
        return $this->hasMany('App\Models\Credit');
    }
}
