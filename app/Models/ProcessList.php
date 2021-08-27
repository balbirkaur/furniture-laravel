<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessList extends Model
{
    protected $table = "processlist";
    protected $fillable = ['title', 'description', 'processpic', 'order'];
}
