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

// Route::get('/', function () {
//     return view('index');
// });
//Route::get('/', 'HomeController@index');

Route::get('/', function () {
	$posts = \App\Post::simplePaginate(5);
    return view('index',['posts'=>$posts]);
 });
Route::get('/users/{id}', function($id){
	$user=\App\User::find($id);
	$posts=$user->posts;
	return view('posts',['posts' => $posts]);
});
Route::get('/posts/{id}', function($id){
	$post=\App\Post::find($id);
	return view('details',['posts' => $post]);
});