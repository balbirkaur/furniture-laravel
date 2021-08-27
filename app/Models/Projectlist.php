<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Projectlist extends Model
{
    use Sluggable;
    protected $table = "projectlists";
    protected $fillable = ['proj_cate_id', 'title', 'description', 'slug', 'client', 'acerage', 'project_date', 'projectpic', 'featured'];
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
        return $this->belongsTo('App\Models\ProjectCategory', 'proj_cate_id', 'id');
    }
    public function notHavingImageInDb()
    {
        return (empty($this->projectpic)) ? true : false;
    }
}
