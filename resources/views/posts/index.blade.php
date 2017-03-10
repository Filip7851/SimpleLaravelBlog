@extends('layouts.master')

@section('title')The Clean Blog - Main Page
@endsection

@section('header-type')
	@component('partials.dynamic.header')
		@slot('img')
			/img/home-bg.jpg
		@endslot
		@slot('main_header')
			Clean Blog
		@endslot
		@slot('desc')
			List of all posts on my blog
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="post-preview">
		@if(count($post) > 0)
			@foreach($post as $p)
				<a href="/posts/{{$p->id}}">
					<h2 class="post-title">{{ $p->post_title }}</h2>
					<h3 class="post-subtitle">{{ $p->post_small_desc }}</h3>
				</a>
				<p class="post-meta">Posted on {{ \Carbon\Carbon::parse($p->created_at)->format('l, jS \\of F Y') }}</p>
			@endforeach
		@else
			<a href="/posts/create">
				<h2 class="post-title">Blog is currently empty</h2>
				<h3 class="post-subtitle">Click here to insert new post.</h3>
			</a>
		@endif
	</div>
	<hr>
	<!-- Pager -->
	<ul class="pager">
		<li class="next">
			<a href="#">Older Posts &rarr;</a>
		</li>
	</ul>
@endsection