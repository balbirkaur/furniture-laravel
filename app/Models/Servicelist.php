<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Servicelist extends Model
{
    use Sluggable;
    protected $table = "servicelists";
    protected $fillable = ['serv_cate_id', 'title', 'description', 'slug', 'servicepic', 'featured'];
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
        return $this->belongsTo('App\Models\ServiceCategory', 'serv_cate_id', 'id');
    }
    public function notHavingImageInDb()
    {
        return (empty($this->servicepic)) ? true : false;
    }
}
