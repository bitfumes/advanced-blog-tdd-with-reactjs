<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BlogTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function user_can_get_all_blogs()
    {
        $res = $this->get('/blog');
        $res->assertSee('blogs');
    }

    /** @test */
    public function admin_can_store_new_blog()
    {
        $this->post('/blog', [
            'title' => 'Blog title',
            'body' => 'blog body'
        ]);
        $this->assertDatabaseHas('blogs', ['title' => 'Blog title']);
    }
}
