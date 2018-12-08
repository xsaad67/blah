<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    
    public function scopeRetrieve($query){
    	return $query->where('active',1);
    }
}
