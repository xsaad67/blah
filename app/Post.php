<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $with = ['category','user'];
    protected $dates = ['deleted_at'];
    
  	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

   public function medias()
    {
        return $this->hasMany('App\Media');
    }
    

    public function claps(){
    	return $this->hasMany('App\Clap');
    }

    public function bookmarks(){
    	return $this->hasMany('App\Bookmark');
    }

    public function getLinkAttribute(){
        return url("/") . "/". $this->category->slug . "/".$this->slug;
    }


    public function featuredMedia($template){
        $template = empty($template) ? "medium" : $template;
        return url("/") ."/img/". $template. "/".$this->featuredImage;
    }

    public function scopePopular($query, $count)
    {
        return $query->orderBy('views','DESC')->take($count);
    }
   
}
