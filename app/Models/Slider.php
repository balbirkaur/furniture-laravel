<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider";
    protected $fillable = ['title', 'link', 'description', 'sliderpic'];

    public function notHavingImageInDb()
   {
    return (empty($this->slidepic))?true:false;
   }
}
