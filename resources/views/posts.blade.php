{{-- kế thừa từ trang master --}}
@extends('layouts.master') 

{{-- thay đổi nội dung phần content --}}
@section('content')
	{{-- expr --}}
	<div class="content col-xs-8">
	@foreach ($posts as $post)
		<div class="col-xs-6">     
        	<article>
            	<div class="post-image">
                	<img src="{{ $post->thumbnail }}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="\posts\{{$post->id}}">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
									Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                    Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                    <a href="\posts\{{$post->id}}"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">{{$post->user->name}}</a></div>
                </div>
            </article>
        
       </div>
	@endforeach	
    {{-- <div class="navigation">
        <a href="{{$posts->previousPageUrl()}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        <a href="{{$posts->nextPageUrl()}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        <div class="clearfix"></div>
    </div> --}}
	</div>
@endsection