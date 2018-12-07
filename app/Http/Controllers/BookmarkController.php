<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;
use Auth;

class BookmarkController extends Controller
{
  
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if(!Auth::check()){
            redirect('login');
        }else{

        $bookmark = new Bookmark();
        $bookmark->post_id = \Crypt::decryptString($request->id);
        $bookmark->user_id =Auth::id();
        $isSave=$bookmark->save();
        if($isSave==1){
            return \Response::json(array('success' => true, 'last_insert_id' => \Crypt::encryptString($bookmark->id ), 200));
        }
    }
    
}

  
    public function show(Bookmark $bookmark)
    {
        //
    }

  
    public function edit(Bookmark $bookmark)
    {
        //
    }

  
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    public function destroy(Request $request)
    {
       $remove = Bookmark::findOrFail(\Crypt::decryptString($request->id))->delete();
        return \Response::json(array('success' => true, 200));
    }
}
