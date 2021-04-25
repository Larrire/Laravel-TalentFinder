<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_skill extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'user_skills';
    // protected $primaryKey = 'id';
    // protected $keyType = 'string';
    // const CREATED_AT = 'date_created';
    // const UPDATED_AT =  'date_updated';
}
