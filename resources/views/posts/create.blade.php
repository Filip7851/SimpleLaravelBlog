@extends('layouts.master')

@section('title')The Clean Blog - Create Post
@endsection

@section('additionals')
	@component('partials.dynamic.tinymce')
		@slot('component')
		content
		@endslot
	@endcomponent
@endsection

@section('header-type')
	@component('partials.dynamic.header')
		@slot('img')
			/img/post-bg.jpg
		@endslot
		@slot('main_header')
			Create Post
		@endslot
		@slot('desc')
			Create new post here
		@endslot
	@endcomponent
@endsection

@section('content')
	<form action="/posts/create" method="post" autocomplete="off">
		<div class="form-group">
			<label for="post_title">Post Title:</label>
			<input type="text" class="form-control" id="post_title" name="post_title">
		</div>
		<div class="form-group">
			<label for="post_short_desc">Short Description:</label>
			<input type="text" class="form-control" id="post_small_desc" name="post_small_desc">
		</div>
		<div class="form-group">
			<label for="post_content">Post Content:</label>
			<textarea class="content form-control" name="post_content" id="post_content"></textarea>
		</div>
		<div class="form-group text-right">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
		{{ csrf_field() }}
		
		@if(count($errors) > 0)
			<div class="form-group alert alert-danger">
				<ol>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ol>
			</div>
		@endif
		@if($passed)
			<div class="alert alert-success">
				<p>Successfully inserted new post!</p>
			</div>
		@endif
	</form>
@endsection