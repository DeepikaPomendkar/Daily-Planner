<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function plan(){
        return $this->hasMany('App\Plan');
    }
}
