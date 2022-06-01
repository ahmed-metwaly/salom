<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $fillable = [
        'promotionable_id', 'priority', 'start_at', 'end_at'
    ];

    public function promotionable() {

        return $this->morphTo();
    }


}
