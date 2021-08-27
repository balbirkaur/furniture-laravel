<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
    use Sluggable;
    protected $table = "blogcategories";
    protected $fillable = ['blog_cat_title', 'blog_cat_slug', 'blog_cat_description', 'status'];
    public function sluggable(): array
    {
        return [
            'blog_cat_slug' => [
                'source' => 'blog_cat_title'
            ]
        ];
    }
    public function categories()
    {
        return $this->hasMany('App\Models\BlogList', 'blog_cate_id');
    }
}
