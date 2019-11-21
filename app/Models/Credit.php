<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    public function loan()
    {
        return $this->belongsTo('App\Models\Loan');
    }
}
