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

Route::get('/', 'HomeController@index');
Route::get('/users/{id}', function($id){
	$user=\App\User::find($id);
	$posts=$user->posts;
	return view('posts',['posts' => $posts]);
});
Route::get('search','HomeController@search');
Route::get('/posts/{slug}','HomeController@show');
Route::get('/contact','HomeController@contact');
Route::get('categories/{name}',function($name){
	$category=\App\Category::Where('name',$name)->first();
	$posts=$category->posts;
	return view('posts',['posts' => $posts]);
});

//Auth::routes();
//['verify' => true,'register'=>true]
//,'verified'
//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
	Auth::routes();
	Route::middleware(['auth'])->group(function(){
		Route::get('/dashboard', 'HomeController@dashboard');
		Route::get('/listposts','PostController@getdata')->name('posts');
		Route::get('/listcategories','CategoryController@getdata')->name('categories');
		Route::get('/listtags','TagController@getdata')->name('tags');
		Route::resource('/posts','PostController');
		Route::resource('/tags','TagController');
		Route::resource('/categories','CategoryController');
	});

});