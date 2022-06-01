<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }

}
