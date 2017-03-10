@extends('layouts.master')

@section('title')Contact Me
@endsection

@section('additionals')
	@component('partials.dynamic.tinymce')
		@slot('component')
		message
		@endslot
	@endcomponent
@endsection

@section('header-type')
	@component('partials.dynamic.header')
		@slot('img')
			img/contact-bg.jpg
		@endslot
		@slot('main_header')
			Contact Me
		@endslot
		@slot('desc')
			Have Questions? I have answers (maybe).
		@endslot
	@endcomponent
@endsection



@section('content')
	<p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
	<form action="/contact" method="post">
		<div class="row control-group">
			<div class="form-group col-xs-12">
				<label>Name</label>

				<input type="text" class="form-control" placeholder="Name" id="name" name="name">
				<p class="help-block text-danger"></p>
			</div>
		</div>
		<div class="row control-group">
			<div class="form-group col-xs-12">
				<label>Email Address</label>

				<input type="email" class="form-control" placeholder="Email Address" id="email" name="email">
				<p class="help-block text-danger"></p>
			</div>
		</div>
		<div class="row control-group">
			<div class="form-group col-xs-12">
				<label>Phone Number</label>

				<input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone_number">
				<p class="help-block text-danger"></p>
			</div>
		</div>
		<div class="row control-group">
			<div class="form-group col-xs-12">
				<label>Message</label>

				<textarea rows="5" class="message form-control" placeholder="Message" id="message" name="message"></textarea>
				<p class="help-block text-danger"></p>
			</div>
		</div>
		<br>
		<div id="success"></div>
		<div class="row">
			<div class="form-group col-xs-12">
				<button type="submit" class="btn btn-default">Send</button>
			</div>
		</div>
		@if(count($errors) > 0)
		<div class="row">
			<div class="form-group alert alert-danger col-xs-12">
				<ol>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach	
				</ol>
			</div>
		</div>
		@endif
		{{ csrf_field() }}
	</form>
@endsection