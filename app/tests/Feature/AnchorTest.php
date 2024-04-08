<?php

namespace Tests\Feature;

use App\Models\Anchor;
use App\Models\User;
use App\Services\AnchorService;
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
        $this->get(route('anchor.create'))->assertOk();
        $response = $this->post(route('anchor.store'), $data->only(['title', 'url', 'ttl', 'max_follows']));

        $this->assertDatabaseHas('anchors', [
            'url' => $data->url
        ]);
        $response->assertRedirect(route('anchor.list'));
    }

    public function test_anchor_is_available(): void
    {
        $anchorService = $this->app->make(AnchorService::class);
        $data = Anchor::factory()->make();
        $anchor = $anchorService->create($data->only(['title', 'url', 'ttl', 'max_follows']));

        $response = $this->get(route('slug', $anchor->slug));

        $response->assertRedirect($anchor->url);
    }

    public function test_anchor_is_not_available(): void
    {
        $anchorService = $this->app->make(AnchorService::class);
        $data = Anchor::factory()->make(['max_follows' => 1,'followed' => 2]);
        $anchor = $anchorService->create($data->only(['title', 'url', 'ttl', 'max_follows', 'followed']));

        $response = $this->get(route('slug', $anchor->slug));

        $response->assertNotFound();
    }
}
