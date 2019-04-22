<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateBlogTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function admin_can_see_create_blog_page()
    {
        $this->get(route('blog.create'))
            ->assertOk()
            ->assertSee('Create New Blog');
    }

    /** @test */
    public function while_creating_blog_title_and_body_field_is_required()
    {
        $this->withExceptionHandling();
        $this->post(route('blog.store'), [])->assertSessionHasErrors(['title', 'body']);
    }
}
