<?php

namespace App\Krucuk_model;

use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{    
     protected $fillable = [
          'merchant_id','sunday','monday','tuesday','wednesday','thursday','friday','saturday'
     ];
}
