<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentList extends Model
{
    

    public function childs()
    {
    	return $this->hasMany(ChildList::class,'parent_lists_id');
    }
}
