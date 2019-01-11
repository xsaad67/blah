<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CanBeVoted;

class ChildList extends Model
{
	use CanBeVoted;

	protected $with = ['votedBy'];
	
    public function parent()
    {
    	$this->belongsTo(ParentList::class,'parent_lists_id');
    }

    public function votedBy(){
    	return $this->morphMany(Vote::class,'votable');
    }

    public function countUpVotes(){

        $count = Vote::where('votable_id',$this->id)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"up_vote")
                        ->count();
        return $count;
    }

    public function countDownVotes()
    {
        $count = Vote::where('votable_id',$this->id)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"down_vote")
                        ->count();
        return $count;   
    }

    public function checkIfGuestUpVote($ip)
    {
        $checkChild = Vote::where('ip',$ip)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"up_vote")
                        ->where('votable_id',$this->id)
                        ->first();
        return $checkChild;
    }
    public function checkIfGuestDownVote($ip)
    {
        $checkChild = Vote::where('ip',$ip)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"down_vote")
                        ->where('votable_id',$this->id)
                        ->first();
        return $checkChild;
    }
 

}
