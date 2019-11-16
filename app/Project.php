<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function properties() {
        return $this->hasMany(Property::class);
    }
}
