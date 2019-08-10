<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	private $posts_per_page = 25;	// TODO settings
	
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show all posts
    public function index()
    {
        return view(
			'admin.post.index', 
			[
				'posts' => Post::with('title', 'published', 'published_ts')
							->latest()
							->paginate($this->posts_per_page)
			]
		);
    }

    // Show the post editor
    public function show(Post $post)
    {
        return view(
			'admin.post.editor', 
			[
				'post' => $post
			]
		);
    }

    // Create post
    public function store(Post $post)
    {
		// TODO
		// create empty post and redirect to editor
    }

}
