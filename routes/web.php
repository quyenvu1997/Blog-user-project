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

//Route::get('/', 'HomeController@index');

// Route::get('/', function () {
// 	$posts = \App\Post::simplePaginate(5);
//     return view('index',['posts'=>$posts]);
//  });
Route::get('/users/{id}', function($id){
	$user=\App\User::find($id);
	$posts=$user->posts;
	return view('posts',['posts' => $posts]);
});
Route::get('search','HomeController@search');
Route::get('/posts/{slug}','HomeController@show');
Route::get('/contact',function(){
	return view('contact');
});
Route::get('categories/{name}',function($name){
	$category=\App\Category::Where('name',$name)->first();
	$posts=$category->posts;
	return view('posts',['posts' => $posts]);
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
	Auth::routes(['verify' => true,'register'=>true]);
	Route::middleware(['auth','verified'])->group(function(){
		Route::get('/home', 'HomeController@index')->name('home');
	});
});