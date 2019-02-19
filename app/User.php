<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'middle_name', 
        'maiden_name', 
        'birth_date', 
        'contact_number', 
        'street', 
        'city', 
        'country', 
        'postal_code', 
        'status', 
        'user_type', 
        'marital_status', 
        'profile_picture', 
        'accepted_terms_at', 
        'accepted_privacy_at', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'user_id';
}
