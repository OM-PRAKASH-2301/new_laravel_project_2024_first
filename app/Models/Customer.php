<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'gender',
        'contact_no',
        'email',
        'password',
        'country',
        'state',
        'district',
        'address',
        'pincode',
        'user_id', // Add this line
    ];
}
