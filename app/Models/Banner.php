<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banner";
    protected $fillable = ['title', 'link', 'description', 'bannerpic'];

    public function notHavingImageInDb()
    {
        return (empty($this->bannerpic)) ? true : false;
    }
}
