<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentList extends Model
{
    protected $with = ['childs'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function childs()
    {
    	return $this->hasMany(ChildList::class,'parent_lists_id');
    }
}
