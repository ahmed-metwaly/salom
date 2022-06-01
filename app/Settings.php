<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
     protected $fillable = [
         
        'commission',
    ];

    public function scopesiteName($query){

        return $query->where( function($q)  {
                            $q->where('id', 1);
                        })
                        ->first()
                        ->pluck('name');
    }

    public function scopeappPhone($query){

        return $query->where( function($q)  {
                            $q->where('id', 1);
                        })
                        ->first()
                        ->pluck('phone');
    }

    public function scopeappEmail($query){

        return $query->where( function($q)  {
                            $q->where('id', 1);
                        })
                        ->first()
                        ->pluck('email');
    }

}
