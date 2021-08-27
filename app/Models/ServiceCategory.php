<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ServiceCategory extends Model
{
    use Sluggable;
    protected $table = "servicecategories";
    protected $fillable = ['service_name', 'service_slug', 'service_description', 'status'];
    public function sluggable(): array
    {
        return [
            'service_slug' => [
                'source' => 'service_name'
            ]
        ];
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Servicelist', 'serv_cate_id');
    }
}
