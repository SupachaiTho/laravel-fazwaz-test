<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    public function properties() {
        return $this->belongsTo(Property::class);
    }
}
