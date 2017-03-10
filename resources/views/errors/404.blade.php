@extends('layouts.master')

@section('title')404
@endsection
@section('header-type')
	@component('partials.dynamic.header')
		@slot('img')
			/img/post-bg.jpg
		@endslot
		@slot('main_header')
			Whoops!
		@endslot
		@slot('desc')
			We can't find that page.
		@endslot
	@endcomponent
@endsection

@section('content')
	Well, that's embarrassing. Here are some options that will help you:
	<ol>
		<li>Check your spelling</li>
		<li>Return to <a href="/posts">Home page.</a></li>
	</ol>
@endsection