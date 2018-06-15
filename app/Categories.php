<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    public function SubCategory()
    {
        return $this->hasMany('App\SubCategories', 'category_id', 'id');
    }
}
