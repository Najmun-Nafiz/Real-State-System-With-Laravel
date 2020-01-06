<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Admin\PropertyCategory');
    }
}
