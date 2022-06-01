<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
        'user_id', 'stars_count', 'rateable_id', 'rateable_type'

    ];

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }

    public function rateable() {

        return $this->morphTo();
    }

}
