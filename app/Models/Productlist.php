<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Productlist extends Model
{
    use Sluggable;
    protected $table = "productlists";
    protected $fillable = ['prod_cate_id', 'title', 'description', 'slug', 'product_date', 'productpic', 'featured'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'prod_cate_id', 'id');
    }
    public function notHavingImageInDb()
    {
        return (empty($this->productpic)) ? true : false;
    }
}
