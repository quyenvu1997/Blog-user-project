<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
class HomeController extends Controller
{
     public function index(){
    	$posts  = Post::simplePaginate(5); // lấy tất cả bài viết bằng câu lệnh hàm all()

    	return view('index',[
    		'posts' => $posts // dữ liệu được truyền qua view bằng biến posts
    	]);
    }
    public function search(Request $request){
    	$q= $request->search;
    	$posts=Post::Where('title','like','%'.$q.'%')
    		->orwhere('description','like','%'.$q.'%')
    		->orwhere('content','like','%'.$q.'%')
    		->paginate(5);
    	return view('searchs',['posts'=>$posts, 'q' => $q]);
    }
    public function show($slug)
    {
        // lấy bài viết có slug truyền vào
        // first() để lấy bản ghi đầu tiên
        $post = Post::where('slug', $slug)->first(); // lấy một bài viết
        // if (isset($cookie('view'))) {
        // 	return view('details', compact('post'));
        // }else{
        // 	cookie('view', 'view', 3600);
        // 	$post->view_count+=1;
        // 	$post->save();
        // 	return view('details', compact('post'));
        // 	dd(cookie('view'));
        // }
        return view('details', compact('post'));
        // compact là một cách để truyền dữ liệu qua view
        
    }
}
