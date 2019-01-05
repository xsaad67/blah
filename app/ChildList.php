<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildList extends Model
{
    public function parent()
    {
    	$this->belongsTo(ParentList::class,'parent_lists_id');
    }
}
