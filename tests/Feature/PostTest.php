<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;
   
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Posts found!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        // arrange 

        $post = new BlogPost();
        $post->title = 'new title';
        $post->content = 'content of the blog post';
        $post->save();

        // Act

        $response = $this->get('/posts');

        $response->assertSeeText('new title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'new title'
        ]);

    }
}
