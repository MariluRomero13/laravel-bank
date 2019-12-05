<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $primarykey = 'loan_id';
    public function loan()
    {
        return $this->belongsTo('App\Models\Loan');
    }
}
