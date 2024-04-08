<?php

namespace Tests\Feature;

use App\Models\Anchor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnchorTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user->delete();
    }

    public function test_anchor_created_successful(): void
    {
        $this->actingAs($this->user);
        $data = Anchor::factory()->make();
//        $this->get(route('anchor.create'))->assertOk();
        $response = $this->post(route('anchor.store'), [
            $data->only(['title', 'url', 'ttl', 'max_follow'])
        ]);

//        $this->assertDatabaseHas('anchors', [
//            'url' => $data->url
//        ]);
//        $response->assertRedirect(route('anchor.list'));

    }
}
