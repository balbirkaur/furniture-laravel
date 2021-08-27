<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
    use Sluggable;
    protected $table = "productcategories";
    protected $fillable = ['product_name', 'product_slug', 'product_description', 'status'];
    public function sluggable(): array
    {
        return [
            'product_slug' => [
                'source' => 'product_name'
            ]
        ];
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Productlist', 'prod_cate_id');
    }
}
