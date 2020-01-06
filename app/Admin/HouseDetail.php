<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HouseDetail extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Admin\HouseCategory','house_category_id');
    }
}
