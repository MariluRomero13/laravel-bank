<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $primaryKey = 'card_number';
    public function customer()
    {
        return $this->belongsTo('App\Models\Curtomer');
    }
}
