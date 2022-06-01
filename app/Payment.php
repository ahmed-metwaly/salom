<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'order_id', 'method', 'bank', 'paper', 'username', 'account_number', 'price', 'status', 'commission',
    ];

    public function order(){

//        return $this->hasOne(Orders::class);
        return $this->belongsTo(Orders::class);
    }

    public function bank(){

        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function orderStatus() {

        return $this->hasOne(OrdersStatus::class, 'payment_id');
    }


}
