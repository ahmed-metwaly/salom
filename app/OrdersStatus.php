<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersStatus extends Model
{
    protected $table = 'orders_status';

    public $timestamps = false;

    public function payment(){

        return $this->belongsTo(Payment::class, 'payment_id');
    }

}