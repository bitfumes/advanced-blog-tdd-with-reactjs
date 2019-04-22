<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateBlogTest extends TestCase
{

    /** @test */
    public function admin_can_see_create_blog_page()
    {
        $this->get(route('blog.create'))
            ->assertOk()
            ->assertSee('Create New Blog');
    }
}
