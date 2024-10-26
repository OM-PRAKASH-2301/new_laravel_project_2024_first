<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Make sure to import this
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password',
    ];

}
