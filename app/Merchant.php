<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{   
    protected $table = 'merchants';

    protected $fillable = ['name', 'password', 'email','place','address','phone','message'];
}
