<?php

namespace App\Krucuk_model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','place','email','user_id','phone','address','instagram','twitter','facebook','price','cover'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category(){
        return $this->belongsTo(\App\Category::class,'category_id','id');
    }

    public function reviews(){
        return $this->hasMany(\App\Krucuk_model\Review::class,'merchant_id', 'id');
    }

    // public function scopeReviewWhere($query, $rating) {
    //     return $query->where(round($merchant->reviews->sum('rating') / $merchant->reviews->count()))
    // }
}
