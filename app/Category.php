<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
	public function posts(){
		return $this->hasMany('App\Post');
	}

	public function lists(){
		return $this->hasMany('App\ParentList');
	}

	public function getLinkAttribute()
	{
		return url("/category")."/".$this->slug;
	}
}
