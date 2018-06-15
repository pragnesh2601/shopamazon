<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Categories','category_id');
    }

}
