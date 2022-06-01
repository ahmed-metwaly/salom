<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionPayment extends Model
{

    protected $fillable = [
        'payed','base',
    ];

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }
}
