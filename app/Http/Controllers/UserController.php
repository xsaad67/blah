<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index','show']]);
  }

   public function index($id){	
		$user = User::find($id);
		return view('users.index',compact('user'));
   }

   public function editProfile(){
   		$user = Auth::user();
     // return $user;
  		return view('users.editProfile',compact('user'));
   }

   public function updateProfile(Request $request){
      
      $user = User::find(Auth::id());
      $user->name = $request->name;
      $user->bio = $request->bio;
      if($request->hasFile('profileImage')){
          $imageName = time().'.'.$request->profileImage->getClientOriginalExtension();
          $path=public_path('/wp-content/uploads/user');
          $request->profileImage->move($path, $imageName);
          $user->image = $imageName;
      }
     if($user->save()){
      return back()->with('message', $user->name.' profile Updated');
     }

   }  


   public function show($slug){
    $user = User::where('slug','=',$slug)->first();
      // return $user;
     return view('users.show',compact('user'));
   }
}
