<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	private $posts_per_page = 25;	// TODO settings
	
    // Get all posts
    public function index()
    {
		
    }

    // Get one post
    public function show($ID)
    {
		
    }
}
