<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Purifier;

class PostController extends Controller
{
    public function index() {
    	//$post = \App\Post::latest()->get();
    	$post = DB::table('posts')->orderBy('created_at', 'desc')->get();
    	
    	return view('posts.index', compact('post'));
    }
    
    public function show(\App\Post $post) {
    	return view('posts.post', compact('post'));
    }
    
    public function store() {
    	$this->validate(request(), [
    		'post_title' => 'required|min:5|unique:posts',
		    'post_small_desc' => 'required|min:5',
		    'post_content' => 'required|min:70'
	    ], [
	    	'post_title.required' => 'Please enter post title.',
		    'post_title.min' => 'Post title must contain at least 5 characters.',
		    'post_title.unique' => 'We already have that post title.',
		    'post_small_desc.required' => 'Please enter small description.',
		    'post_small_desc.min' => 'Small description must contain at least 5 characters.',
		    'post_content.required' => 'Please enter post content.',
		    'post_content.min' => 'Post content must contain at least 50 characters.'
	    ]);
    	
    	//\App\Post::create(request(['post_title', 'post_small_desc', 'post_content']));
    	
    	DB::table('posts')->insert([
    		[
			    'post_title' => (request('post_title')),
			    'post_small_desc' => (request('post_small_desc')),
			    'post_content' => Purifier::clean(request('post_content'))
		    ]
	    ]);
    	
    	$passed = true;
    	
    	return view('posts.create', compact('passed', 'posts'));
    }
    
    public function create() {
    	$passed = false;
    	return view('posts.create', compact('passed'));
    }
}
