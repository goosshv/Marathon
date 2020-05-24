<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarathonImage extends Model
{
    //
    public function images() {
        return $this->belongsTo('App\Marathon');
    }
}
