<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function counties() {
        return $this->belongsToMany(County::class, 'region_counties');
    }
}
