<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body', 'featured_photo', 'url',
    ];

    protected $primaryKey = 'headline_id';
}
