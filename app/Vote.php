<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function voted()
    {
        return $this->morphTo();
    }
}
