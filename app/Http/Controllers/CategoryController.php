<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
   
    public function index()
    {
        $popularPost =  \App\Post::popular(6)->get();

        $categories = Category::has('posts', '>=', 3)->take(5)->get();
        foreach ($categories as $category)
        {
         $category->latestposts = $category->posts()->inRandomOrder()->orderBy('created_at','desc')->take(5)->get();
        }

        return view('index',compact('categories','popularPost'));
    }

    
    public function create()
    {
        return view("categories.create");
    }


    public function listCategories()
    {
        $categories = Category::all();

        return view("categories.listCategories",compact('categories'));
    }
   
    public function store(Request $request)
    {
        
        

        // Local Variable
        $imageName = NULL;

        $category = new Category();
        $category->name = $request->name;
        $category->published = $request->published;
        $category->slug = getUniqueSlug($category,$request->name);

        if($request->hasFile("image")){
     
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $path=public_path('/wp-content/uploads/categories');
            $request->image->move($path, $imageName);
        }

        $category->image = $imageName;
        $category->save();
        return redirect()->back()->withSuccess('Category created');

    }


    public function show($categorySlug)
    {  

        $category = Category::where("slug","=",$categorySlug)->firstorfail();
        // return $category;
        return view('categories.index',compact('category'));
    }


    public function edit(Category $category)
    {
        return view("categories.edit",compact('category'));
    }
    

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->published = $request->published;

        if($request->hasFile("image")){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $path=public_path('/wp-content/uploads/categories');
            $request->image->move($path, $imageName);
            $category->image = $imageName;
        }

        $category->save();
    }


    public function destroy(Category $category)
    {
      // dd($category);
       $category->delete();
    }

}
