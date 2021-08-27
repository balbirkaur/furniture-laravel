<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model
{
    protected $table = "homesettings";
    protected $fillable = ['aboutus_text', 'process_text', 'project_text',  'contact_text'];
}
