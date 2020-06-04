<?php

namespace App\Krucuk_model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'merchant_id','rating','status','review','user_id'
    ];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
