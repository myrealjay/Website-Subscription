<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    use RefreshDatabase;

    protected $website;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->website = Website::factory()->create();
        $this->user = User::factory()->create();
    }
    /** 
     *
     * @test
     * @return void
     */
    public function it_successfully_subscribes_a_user()
    {
        $data = [
            'website_id' => $this->website->id,
            'user_id' => $this->user->id
        ];

        $response = $this->post('/api/subscriptions', $data);

        $response->assertStatus(200);
    }

    /** 
     *
     * @test
     * @return void
     */
    public function it_does_not_subscribe_a_user_twicw_to_same_website()
    {
        $data = [
            'website_id' => $this->website->id,
            'user_id' => $this->user->id
        ];

        $response = $this->post('/api/subscriptions', $data);

        $response->assertStatus(200);

        $response = $this->post('/api/subscriptions', $data);

        $response->assertStatus(400);
    }
}
