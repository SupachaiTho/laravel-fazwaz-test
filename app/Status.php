<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function properties() {
        return $this->belongsTo(Property::class);
    }
}
