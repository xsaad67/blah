<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PostController extends Controller
{
   
    
    public function __construct(){
      $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'destroy','listPosts','trashedPosts']]);
    }

    public function index()
    {
      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }



    public function uploadImage(Request $request){
        
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/wysiwyg/', $filename);
                $url = url('wysiwyg/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }


 
    public function store(Request $request)
    {
      
      $validatedData = $request->validate([
        'title' => 'required|max:190',
        'body' => 'required',
        'category' => 'required',
        'image' => 'mimes:jpeg,jpg,png,gif,webp|required',
      ]);

      $post = new Post();

       if($request->hasFile('image')){

          $imageName = time().'.'.$request->image->getClientOriginalExtension();
          $path=public_path('/wp-content/uploads/');
          $request->image->move($path, $imageName);
          $post->featuredImage = $imageName;
       }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id= auth()->id();
        $post->category_id =$request->category;
        $post->status = 'published';
        $post->confirmed =1;
        $post->views = 1;
        $post->tag_id = 1;
        $post->slug = getUniqueSlug($post,$request->title);
        
        $is_save=$post->save();
        if($is_save == 1){
            return back()->withSuccess('Post uploaded');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($category,$slug)
    { 
        $post = Post::where('slug', '=', $slug)->firstOrFail();
      
        $post->increment('views');
        $medias = $post->medias->all();
        $clapCount = $post->claps->count(); 
        $wordToRead = wordToMinutes(strip_tags($post->body));
        $lastRows = Post::inRandomOrder()->take(3)->get();   
        return view('posts.show',compact('post','medias','clapCount','wordToRead','lastRows'));
    }

    public function edit(Post $post)
    {

         
      if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
         return abort(404);
      }
        return view('posts.editPost',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        
      if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
         return abort(404);
      }

      $validatedData = $request->validate([
        'title' => 'required|max:190',
        'body' => 'required',
        'category' => 'required',
      ]);

      $post->title = $request->title;
      $post->category_id = $request->category;
      $post->body = $request->body;
      
      $post->metaTitle = $request->metaTitle;
      $post->metaDescription = $request->metaDescription;
      $post->metaKeywords = $request->metaKeywords;

      $post->slug = getUniqueSlug($post,$request->title);

       if($request->hasFile('featured')){
            $imageName = time().'.'.$request->featured->getClientOriginalExtension();
            $path=public_path('/wp-content/uploads/');
            $request->featured->move($path, $imageName);
            $post->featuredImage=$imageName;
       }

      $post->save();
      return back()->with("message","Post updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         
      if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
         return abort(404);
      }

      $post->delete();
      return back()->with('message', 'Successfully Trashed');
       
    }


    public function listPosts(){
        $user = User::findOrFail(auth()->id());
        $posts=$user->posts()->latest()->get();
        // return $posts;
        return view('posts.listPosts',compact('posts'));
    }

    public function trashedPosts(){

      if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
         return abort(404);
      }

        $posts = Post::onlyTrashed()
                ->where('user_id', auth()->id())
                ->get();
      return view("posts.trashedPosts",compact('posts'));
    }

    public function permenantDelete($post){

       
    if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
       return abort(404);
    }

    $post = Post::onlyTrashed()->where('id',$post)->first();
    if($post->user_id == auth()->id()){
         $post->forceDelete();
        return back()->with('message', 'Successfully Deleted');
       }else{
        abort(404);
    }
}

    public function restorePost($post){
         
      if(  (auth()->user()->isAdmin != 1)  && (auth()->id() != $post->user->id)){
         return abort(404);
      }

    $post = Post::onlyTrashed()->where('id',$post)->firstOrFail();
        if($post->user_id == auth()->id()){
            $post->restore();
           return back()->with('message', 'Successfully Restored');
       }else{
        abort(404);
       }

    }
    
    
     public function sitemap(){
        ini_set('short_open_tag',0);
        $posts = Post::all();
        $categories = \App\Category::all();
        $users = \App\User::all();
        return response()->view('posts.sitemap',[
            "posts" => $posts,
            "users" => $users,
            "categories" => $categories,
        ])->header('Content-Type', 'text/xml');
    }
    
    
}
