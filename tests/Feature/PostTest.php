<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     *  @test
     *
     * @return void
     */
    public function test_can_create_a_post()
    {
        $website = Website::factory()->create();
        $data = [
            'website_id' => $website->id,
            'title' => 'My title',
            'description' => 'some description'
        ];
        $response = $this->post('/api/posts',$data);

        $response->assertStatus(200);
    }
}
