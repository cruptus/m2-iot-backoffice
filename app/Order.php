<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'restaurent_id', 'total'];

    public function user () {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function restaurent () {
        return $this->hasOne('App\User', 'id', 'restaurent_id');
    }
}
