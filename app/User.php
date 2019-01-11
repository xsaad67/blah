<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Vote;

class User extends Authenticatable
{
    use Notifiable,Vote;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function getPostsPaginatedAttribute()
    {
        return $this->posts()->paginate(6);
    }

    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }


    public function getLinkAttribute(){
        return url("/") ."/author/".$this->slug;
    }

    public function getDpAttribute(){
        return is_null($this->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$this->image);
    }
    
}
