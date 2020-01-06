<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Homeaddress extends Model
{
    public function home()
    {
    	return $this->belongsTo('App\Admin\Homedetail');
    }
}
