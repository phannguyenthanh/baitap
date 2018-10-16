<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "district";
    
    public function account(){

        return $this->belongsTo('App\Account','district_id','id');

    }
    public function wards(){

        return $this->hasMany('App\Wards','district_id','id');

    }
}
