<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
    	return $this->belongstoMany('App\Category')->withTimestamps();
    }

    public static function getProductWithBrand()
    {
    	$productWithBrand = collect();
        $categories = Category::where('type', 'brand')->get();
        foreach($categories as $category)
        {
            $productWithBrand->push($category->products);
        }

        return $productWithBrand;
    }
}
