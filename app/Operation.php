<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    protected $fillable = [
        'operation_type','price', 'reason', 'company_id', 'user_id'
    ];

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

}
