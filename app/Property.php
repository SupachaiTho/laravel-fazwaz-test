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

    public function counties() {
        return $this->belongsTo(County::class);
    }

    public function projects() {
        return $this->belongsToMany(Project::class, 'projects_properties');
    }
}
