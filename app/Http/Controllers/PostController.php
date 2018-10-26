<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('admin.posts.edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json([
            'message'=>'Xoa thanh cong',
            'error'=>false
        ]);
    }
    public function getdata()
    {
        return Datatables::of(Post::query())
            ->addColumn('action', function ($post) {
                return '<button type="" class="btn btn-sm btn-info fa fa-eye" data-toggle="modal" href="#modal-show" data-id="'.$post->id.'"></button>
                <a href="/admin/posts/'.$post->id.'/edit" class="btn btn-warning fa fa-edit text-white"></a>  
                <button data-id="'.$post->id.'" class="btn btn-danger fa fa-trash-alt"></button>';
            })
            ->addColumn('Post by', function ($post) {
                return $post->user->name;
            })
            // ->editColumn('thumbnail', function ($user) {
            //     return '<img src="'.$user->thumbnail.'" alt="">';
            // })
            ->make(true);
    }
}
