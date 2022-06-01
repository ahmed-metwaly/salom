<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }
}
