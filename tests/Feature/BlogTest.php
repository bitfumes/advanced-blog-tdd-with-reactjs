<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Blog;

class BlogTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_get_all_blogs()
    {
        $blog = factory(Blog::class)->create();
        $res = $this->get(route('blog.index'));
        $res->assertSee($blog->title);
    }

    /** @test */
    public function admin_can_store_new_blog()
    {
        $this->post(route('blog.store'), [
            'title' => 'Blog title',
            'body' => 'blog body'
        ])
            ->assertRedirect(route('blog.create'))
            ->assertSessionHas('message');
        $this->assertDatabaseHas('blogs', ['title' => 'Blog title']);
    }

    /** @test */
    public function admin_can_delete_a_blog()
    {
        $blog = factory(Blog::class)->create();
        $this->delete(route('blog.destroy', '1'));
        $this->assertDatabaseMissing('blogs', ['title' => $blog->title]);
    }

    /** @test */
    public function admin_can_update_a_blog()
    {
        $blog = factory(Blog::class)->create();
        $this->patch(route('blog.update', $blog->id), [
            'title' => 'new title'
        ]);
        $this->assertDatabaseHas('blogs', ['title' => 'new title']);
    }
}
