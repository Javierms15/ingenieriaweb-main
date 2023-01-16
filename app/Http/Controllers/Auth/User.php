<?php

namespace App\Http\Controllers\Auth;

use Jenssegers\Mongodb\Eloquent\Model;

class User extends Model
{
   protected $connection = 'mongodb';


   protected $fillable = [
    'name', 'email', 'password','social_id','social_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'two_factor_recovery_codes','two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];
}