<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userLogin extends Model
{
    protected $table='user';
    protected $fillable=['firstname','lastname','phone','email','password'];
}
