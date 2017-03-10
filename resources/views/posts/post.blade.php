@extends('layouts.master')

@section('title') {!! html_entity_decode($post->post_title) !!}
@endsection

@section('header-type')
	@component('partials.dynamic.post_header')
		@slot('post_title')
			{{ html_entity_decode($post->post_title) }}
		@endslot
		@slot('post_short_desc')
			{{($post->post_small_desc)}}
		@endslot
		@slot('post_created_at')
			{{ html_entity_decode($post->created_at->toFormattedDateString()) }}
		@endslot
	@endcomponent
@endsection

@section('content')
	{!! $post->post_content !!}
@endsection