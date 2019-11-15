<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function properties() {
        return $this->belongsTo(Property::class);
    }

    public function regions() {
        return $this->belongsToMany(Region::class, 'region_counties');
    }
}
