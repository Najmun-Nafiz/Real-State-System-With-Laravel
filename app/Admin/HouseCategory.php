<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HouseCategory extends Model
{
    public function details()
    {
    	return $this->hasMany('App\Admin\HouseDetail');
    }
}
