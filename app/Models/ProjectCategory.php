<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends Model
{
    use Sluggable;
    protected $table = "projectcategories";
    protected $fillable = ['project_title', 'project_slug', 'projects_description', 'status'];
    public function sluggable(): array
    {
        return [
            'project_slug' => [
                'source' => 'project_title'
            ]
        ];
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Projectlist', 'proj_cate_id');
    }
}
