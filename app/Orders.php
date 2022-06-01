<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'company_id', 'service_id', 'total_price', 'date', 'individual_count', 'is_home', 'lat', 'long'
    ];

    public function payment(){

//        return $this->belongsTo(Payment::class, 'id');
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function company(){

        return $this->belongsTo(User::class, 'company_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function service(){

        return $this->belongsTo(Service::class, 'service_id');
    }


    public function scopeDoneOrders($query, $companyId){

        return $query->where('company_id', $companyId)
            ->whereHas('payment', function ($q) {
                $q->where('status', 1);
            })
            ->whereHas('payment.orderStatus', function ($q) {
                $q->where('status', 1);
            });
    }

    public function scopeNewOrders($query, $companyId){

        return $query->where('company_id', $companyId)
            ->whereHas('payment', function ($q) {
                $q->where('status', 1);
            })
            ->whereHas('payment.orderStatus', function ($q) {
                $q->where('status', 3);
            });
    }

    public function scopeNotDoneOrders($query, $companyId){

        return $query->where('company_id', $companyId)
            ->whereHas('payment', function ($q) {
                $q->where('status', 1);
            })
            ->whereHas('payment.orderStatus', function ($q) {
                $q->where('status', 0);
            });
    }

    public function scopePendingOrders($query) {

        return $query->whereDate('date', '>=', Carbon::today()->toDateString())
            ->whereHas('payment', function ($q){
                $q->where('status', 2);
            });
    }

    public function scopeRejectedOrders($query) {

        return $query->whereHas('payment', function ($q) {
            $q->where('status', 0);
        });
    }

}
