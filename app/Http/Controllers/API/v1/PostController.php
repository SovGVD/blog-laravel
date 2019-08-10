<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends APIController
{
	private $posts_per_page = 25;	// TODO settings
	
    // Get all posts
    public function index()
    {
		$result = Post::select('title', 'intro', 'published')
			->latest()
			->paginate($this->posts_per_page);
		return $this->success($result);
    }

    // Get one post
    public function show($ID)
    {
		if ($result = Post::find($ID)) {
			return $this->success($result);
		} else {
			return $this->fail("unable_to_find_record", 404);
		}
    }
}
