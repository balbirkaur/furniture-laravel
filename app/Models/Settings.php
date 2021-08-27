<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = "settings";
    protected $fillable = ['header_email_id', 'header_toll_free', 'facebook_link',  'twitter_link', 'instagram_link', 'dribble_link', 'google_link', 'footer_address', 'footer_phone', 'footer_email', 'footer_opening_hours', 'footer_text'];
}
