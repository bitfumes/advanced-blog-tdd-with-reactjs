<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    /**
     * @test
     */
    public function user_can_get_all_blogs()
    {
        $res = $this->get('/blog');
        $res->assertSee('blogs');
    }
}
