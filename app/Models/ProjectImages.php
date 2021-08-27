<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    protected $table = "projectimages";
    protected $fillable = ['project_id', 'projectpic'];
}
