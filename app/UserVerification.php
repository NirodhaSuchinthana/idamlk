<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
