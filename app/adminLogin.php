<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminLogin extends Model
{
    protected $table='admin';
    protected $fillable=['username','password'];
}
