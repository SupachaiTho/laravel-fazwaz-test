<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function property_type() {
        return $this->belongsTo(PropertyType::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
