<?php

namespace App\Krucuk_model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{    
     protected $fillable = [
          'merchant_id','image'
     ];
}
