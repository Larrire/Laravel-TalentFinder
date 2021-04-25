<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'user_social_medias';
}
    