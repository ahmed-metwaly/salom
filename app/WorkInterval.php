<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkInterval extends Model
{

    protected $fillable = [
        'work_day', 'work_time', 'company_id'
    ];

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }
}
