<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Categories','category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategories','sub_category_id');
    }
	public function getJsonAttribute($value)
   	{
       return json_decode($value);
   	}
}
