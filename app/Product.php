<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
    	return $this->belongstoMany('App\Category')->withTimestamps();
    }

    public function getBtuValueAttribute()
    {
        return $this->categories()->where('type', 'btu')->first()->name;
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

    public function getMetaDescriptionAttribute()
    {
        return $this->meta_brand . ' | ' . $this->model . ' | RM' . number_format($this->price, 2, '.', ',');
    }

    public function getMetaBrandAttribute()
    {
        return $this->categories()->where('type', 'brand')->first()->name;
    }
}
