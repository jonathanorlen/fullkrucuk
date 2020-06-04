<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 
        'email',
        'birth_date',
        'status',
        'role',
        'password',
        'address',
        'phone'
    ];

    protected $hidden = [''];
}
