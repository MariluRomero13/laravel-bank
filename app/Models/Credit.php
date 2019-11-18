<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public function creditBureau()
    {
        return $this->belongsTo('App\Models\CreditBureau');
    }
}
