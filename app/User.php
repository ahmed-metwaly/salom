<?php
namespace App;



use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $dates = ['active_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'photo', 'user_type', 'id_number',
        'city_id', 'location_text', 'lat', 'long', 'invited_by', 'provider', 'provider_id', 'conf_status','admin_is_conf'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value){

        $this->attributes['password'] = bcrypt($value);
    }


    public function services(){

        return $this->hasMany(Service::class, 'company_id');
    }

    public function workTimes(){

        return $this->hasMany(WorkTime::class, 'company_id');
    }

    public function workInterval(){

        return $this->hasOne(WorkInterval::class, 'company_id');
    }

//    public function ratings(){
//
//        return $this->hasMany(Rating::class, 'company_id');
//    }

    public function userOrders(){

        return $this->hasMany(Orders::class, 'user_id');
    }

    public function companyOrders(){

        return $this->hasMany(Orders::class, 'company_id');
    }

    public function group(){

        return $this->belongsTo(Groups::class, 'group_id');
    }

    public function city(){

        return $this->belongsTo(City::class);
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


    public function scopeuserCompany($query, $type){

        return $query->where(function($q2) use($type) { $q2->where('user_type', $type); });
    }

    public function scopeusersTypeCount($query, $type){

        return $query->where( function($q) use($type) {
                                $q->where('user_type', $type);
                                })
                                ->count();
    }

//    public function isActive(){
//
//        return $this->status;
//    }

}
