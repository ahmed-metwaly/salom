<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable = [
        'day_id', 'time_from', 'time_to', 'workable_id', 'workable_type', 'orders_count_per_interval'

    ];


    public function day(){

        return $this->belongsTo(Day::class, 'day_id');
    }


    public function workable() {

        return $this->morphTo();
    }
}
