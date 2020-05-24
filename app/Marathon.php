<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marathon extends Model
{
    //
    public function images() {
        return $this->hasMany('App\MarathonImage');
    }
}
