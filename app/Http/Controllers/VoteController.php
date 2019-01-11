<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\User;
use App\ChildList;

class VoteController extends Controller
{
    public function voteUp(Request $request)
    {
        $childId = $request->id;

    	if(auth()->check()){
	    	$childList = ChildList::find($childId);
			$user = auth()->user();
			$user->upVote($childList);
    	}else{
            $userIp = $request->ip;
    		$this->CancelIfGuestVote("down_vote",$userIp,'App\ChildList',$request->id);
    		$vote = new Vote();
    		$vote->ip = $userIp;
    		$vote->type = "up_vote";
    		$vote->votable_type = "App\ChildList";
    		$vote->isGuest = 1;
            $vote->votable_id = $childId;
    		$vote->save();
            $countUpVoters = $this->countUpVotes($childId);
            return response()->json(['success'=>true,'upVoteCount'=>$countUpVoters]);
    	}

    }

    public function voteDown(Request $request){

         $childId = $request->id;

        if(auth()->check()){
            $childList = ChildList::find($childId);
            $user = auth()->user();
            $user->downVote($childList);
        }else{
            $userIp = $request->ip;
            $this->CancelIfGuestVote("up_vote",$userIp,'App\ChildList',$request->id);
            $vote = new Vote();
            $vote->ip = $userIp;
            $vote->type = "down_vote";
            $vote->votable_type = "App\ChildList";
            $vote->isGuest = 1;
            $vote->votable_id = $childId;
            $vote->save();
            $countDownVotes = $this->countDownVotes($childId);
            return response()->json(['success'=>true,'upVoteCount'=>$countDownVotes]);
        }

    }

    public function countUpVotes($votableId){

        $count = Vote::where('votable_id',$votableId)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"up_vote")
                        ->count();
        return $count;
    }

    public function countDownVotes($votableId)
    {
        $count = Vote::where('votable_id',$votableId)
                        ->where('votable_type',"App\ChildList")
                        ->where('type',"down_vote")
                        ->count();
        return $count;   
    }
    public function checkIfGuestVote($type="up_vote",$ip,$votable_type,$votable_id)
    {
    	$checkChild = Vote::where('ip',$ip)
		    			->where('votable_type',$votable_type)
		    			->where('type',$type)
                        ->where('votable_id',$votable_id)
                        ->first();
		return $checkChild;
    }

    public function CancelIfGuestVote($type,$ip,$votable_type,$votable_id){

        $checkVote = $this->checkIfGuestVote($type,$ip,$votable_type,$votable_id);

        if($checkVote){
            $checkVote->delete();
        }
    }

}
