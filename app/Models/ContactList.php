<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $table = "contactlist";
    protected $fillable = ['name', 'email_id', 'message'];
}
