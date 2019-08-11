<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\ImpersonatesUsers;
use App\Post;
use App\User;

class PostTest extends TestCase
{
	// BUG in laravel-mongodb https://github.com/jenssegers/laravel-mongodb/issues/1334
	// this will not work as expected and on every test
	// mongo will be filled with `posts_per_page`+10 fake data
	use DatabaseTransactions;
	
	public function testPostIndex()
	{
		$user = factory(User::class)->create();
		// Workaround for MongoDB bug
		$posts = [];
		for ($i = 0; $i < (config('posts.posts_per_page')+10); $i++) {
			$posts[$i] = factory(Post::class)->create();
		}
		
		$this->actingAs($user)
			->withSession([])
			->get("/admin/post")
			->assertOk()
			->assertSee("id=\"admin_post_create\"")	// check Create button
			->assertSee("class=\"list-group-item list-group-item-action\"")	// check items available
			->assertSee("pagination");	// pagination for more than `posts_per_page` items
		
		// Remove posts
		foreach ($posts as $post) {
			$post->delete();
		}
	}
	
	public function testPostForm()
	{
		$user = factory(User::class)->create();
		$post = factory(Post::class)->create();
		$this->actingAs($user)
			->withSession([])
			->get("/admin/post/".$post->id)
			->assertOk()
			->assertSee("id=\"title\"")	// check if title and all other fields and button available
			->assertSee("id=\"intro\"")
			->assertSee("id=\"tags\"")
			->assertSee("id=\"published\"")
			->assertSee("id=\"admin_post_save_button\"")
			->assertSee("id=\"admin_post_delete_button\"");
		$post->delete();
	}
	
	public function testPostUpdate()
	{
		$user = factory(User::class)->create();
		$post = factory(Post::class)->create();
		
		$post->title="Title1";
		// TODO all other fields
		$post->save();
		
		$test_post = Post::find($post->id);
		if ($test_post->title == 'Title1') {
			$test_post->delete();
			$this->assertTrue(true);
		} else {
			$this->assertTrue(false);
		}
	}


}
