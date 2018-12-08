<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Auth Routes */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/author/{slug}','UserController@show');

/* Home Page */
Route::get('/','CategoryController@index');
Route::post('upload_image','PostController@uploadImage')->name('upload-image');

/** Posts Route **/
Route::get('/create-post','PostController@create');
Route::post('/store-post','PostController@store');
Route::get('/edit-post/{post}','PostController@edit');
Route::post('/update-post/{post}','PostController@update');
Route::get('/delete-post/{post}','PostController@destroy');
Route::get('/category/{categorySlug}','CategoryController@show');
Route::get("/restore-post/{post}","PostController@restorePost");
Route::get("/permdel-post/{post}","PostController@permenantDelete");

Route::get("/trashed-posts","PostController@trashedPosts");
Route::get('/sitemap.xml','PostController@sitemap');


/** Category Routes **/

Route::get('/search','SearchController@index');

Route::get('/create-category','CategoryController@create');
Route::post('/post-category','CategoryController@store');
Route::get('/edit-category/{category}','CategoryController@edit');
Route::post('/{id}/update-category','CategoryController@update');
Route::get('/delete-category/{category}','CategoryController@destroy');
Route::get("/{category}/{slug}", ["uses" => "PostController@show"]);

/** Bookmark Routes **/
Route::post('/add-bookmark','BookmarkController@store');
Route::post('/remove-bookmark','BookmarkController@destroy');


/** User Routes **/
Route::get('/edit-profile','UserController@editProfile');
Route::post('/update-profile','UserController@updateProfile');


/** Admin Routes**/
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::post('/subscribe','NewsLetterController@store');


/** Allowed For Admin Only **/
Route::get('/list-categories','CategoryController@listCategories');
Route::get('/list-posts','PostController@listPosts');

Route::get('/send', 'EmailController@send');


Route::get('/create-clap',function(){
	return view('clap');
});





// Route::post('/clap.html','ClapController@store');
