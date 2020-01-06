<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    public function details()
    {
    	return $this->hasMany('App\Admin\PropertyDetail');
    }
}
