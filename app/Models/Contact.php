<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
    protected $fillable = ['email', 'address', 'map_lat', 'map_lng', 'map_popup', 'facebook', 'instagram', 'twitter'];
}
