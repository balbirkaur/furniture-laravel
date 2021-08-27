<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $table = "contact";
    protected $fillable = ['address', 'phone_number', 'email_id',  'form_email_id', 'address_map'];
}
