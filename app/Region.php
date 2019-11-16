<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function counties() {
        return $this->belongsTo(Country::class);
    }

    public function properties() {
        return $this->hasMany(Property::class);
    }
}
