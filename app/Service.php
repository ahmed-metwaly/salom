<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }

    public function days() {

        return $this->belongsToMany(Day::class)->withTimestamps();
    }

    public function ratings(){

        return $this->morphMany(Rating::class, 'rateable');
    }

    public function promotions(){

        return $this->morphMany(Promotion::class, 'promotionable');
    }

    public function works(){

        return $this->morphMany(Work::class, 'workable');
    }



    public function scopeActive($query, $companyId){

        return $query->where([ ['company_id', $companyId], ['is_active', true] ]);
    }

    public function scopeBlocked($query, $companyId){

        return $query->where([ ['company_id', $companyId], ['has_blocked', true] ]);
    }

}
