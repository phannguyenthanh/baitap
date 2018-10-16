<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "account";

    public function district(){

        return $this->belongsTo('App\District','district_id','id');
    }
    public function wards(){

        return $this->belongsTo('App\Wards','wards_id','id');
    }
}
