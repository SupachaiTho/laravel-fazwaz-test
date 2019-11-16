<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function property_types() {
        return $this->belongsTo(PropertyType::class);
    }

    public function statuses() {
        return $this->belongsTo(Status::class);
    }

    public function regions() {
        return $this->belongsTo(Region::class);
    }

    public function projects() {
        return $this->belongsTo(Project::class);
    }
}
