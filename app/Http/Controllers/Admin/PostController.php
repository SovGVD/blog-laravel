<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Auth;
use App\Post;

class PostController extends Controller
{
	
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
				'posts' => Post::select('title', 'published')
							->latest()
							->paginate(config('posts.posts_per_page'))
			]
		);
    }

    // Show the post editor
    public function show(Post $post)
    {
        return view(
			'admin.post.edit', 
			[
				'post' => $post
			]
		);
    }

    // Create post
    public function create()
    {
        return view(
			'admin.post.create', 
			[
				'post' => null
			]
		);
    }
    
    //Save new post
    public function store(StorePost $request)
    {
		$user = Auth::user();
		
		$post = new Post;
		$post->title        = $request->input('title');
		$post->intro        = $request->input('intro');
		$post->content      = $request->input('content');
		$post->tags         = $request->input('tags');	// TODO, separate by comma to array, unique, sort, etc
		$post->author_id    = $user->id;
		$post->author_name  = $user->name;	//TODO belongTo between MySQL and MongoDB?
		$post->published    = $request->input('published')?true:false;
		$post->published_ts = $request->input('published')?time():0;	// Carbon? DATETIME?
		$post->save();
		
		return redirect()->route('post.show', $post);
    }

    //Update current post
    public function update(StorePost $request, Post $post)
    {
		// TODO, nice copy-paste
		$user = Auth::user();
		
		$post->title        = $request->input('title');
		$post->intro        = $request->input('intro');
		$post->content      = $request->input('content');
		$post->tags         = $request->input('tags');
		$post->author_id    = $user->id;
		$post->author_name  = $user->name;
		$post->published    = $request->input('published')?true:false;
		$post->published_ts = $request->input('published')?time():0;
		$post->save();
		
		return redirect()->route('post.show', $post);
    }

	//Remove current post
    public function destroy(Post $post)
    {
		$post->delete();
		
		return redirect()->route('post.index');
    }
}
