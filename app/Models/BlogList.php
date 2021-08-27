<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogList extends Model
{
    use Sluggable;
    protected $table = "bloglist";
    protected $fillable = ['blog_cate_id', 'title', 'description', 'excerpt', 'slug', 'blogpic', 'featured', 'status'];
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
        return $this->belongsTo('App\Models\BlogCategory', 'blog_cate_id', 'id');
    }
    public function notHavingImageInDb()
    {
        return (empty($this->blogpic)) ? true : false;
    }
}
