<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table="wards";

    public function account(){

        return $this->hasMany('App\Account','wards_id','id');      
    }
    public function district(){

        return $this->belongsTo('App\District','district_id','id');
    }
}
