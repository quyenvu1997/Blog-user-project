@extends('layouts.admin')
@section('content')
<div class="container-fluit">
	<form action="/admin/post" method="POST" class="" role="form">
		@csrf
		<div class="row">
			<div class="col-8">
				<div class="form-group">
			        <label>Title:</label>
			        <input type="text" class="form-control" name="title" placeholder="Title..." value='{{$post->title}}'>
			    </div>
			    <div class="form-group">
			        <label>Description:</label>
			        {{-- <input type="text" class="form-control" name="description" placeholder="Title..."> --}}
			        <textarea name="description" class="form-control" rows="7">{{$post->description}}</textarea>
			    </div>
			    <div class="form-group">
			        <label>Content:</label>
			        <textarea name="content" class="form-control" rows="20" id="content">{{$post->content}}</textarea>
			        {{-- <input type="text" class="form-control" name="content" placeholder="Title..."> --}}
			    </div>
			</div>
			<div class="col-4">
				<div class="rounded border border-muted">
					<div class="bg-info text-white text-center font-weight-bold rounded-top" style="font-size: 30px;">
						CATEGORIES
					</div>
					<div class="p-2" style="font-size: 20px;">
						@foreach ($categories as $category)
							<input type="checkbox" name="categories" value="{{$category->id}}"
								@if ($category->id==$post->category->id)
									checked
								@endif
							>{{$category->name}}
							<br>
						@endforeach
					</div>	
				</div><br>
				<div class="rounded border border-muted">
					<div class="bg-info text-white text-center font-weight-bold rounded-top" style="font-size: 30px;">
						Thumbnail
					</div>
					<div class="p-2" style="font-size: 20px;">
						
					</div>	
				</div><br>
				<div class="rounded border border-muted">
					<div class="bg-info text-white text-center font-weight-bold rounded-top" style="font-size: 30px;">
						Tag
					</div>
					<input type="text" name="tag" class="form-control" placeholder="">	
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Thêm</button>
	</form>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	//$('#cke_1_contents').css('height' = '600px');
	CKEDITOR.config.height = '600px';
	CKEDITOR.replace( 'content' );

</script>
@endsection