<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=\App\Post::simplePaginate(5);
        return view('index',['posts'=>$posts]);
    }
    public function dashboard()
    {
        return view('admin.index');
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
        $post = Post::where('slug', $slug)->first(); // lấy một bài viết
        return view('details', compact('post'));
    }
    public function contact(){
        return view('contact');
    }
}
