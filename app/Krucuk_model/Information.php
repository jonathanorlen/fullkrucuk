<?php

namespace App\Krucuk_model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{    
     protected $table ='informations';
     protected $fillable = [
          'merchant_id','info'
     ];
}
