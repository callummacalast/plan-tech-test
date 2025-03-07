<?php

namespace Tests\Feature;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    private $videos;
    private $searchAbleVideo;

    public function setUp(): void
    {
        parent::setUp();
        $this->videos = Video::factory(5)->create();
    }


    public function test_can_list_videos(): void
    {
        $response = $this->getJson(route('api.videos.index'));

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'success' => true
        ]);

        $dataCoutnt = count($this->videos->toArray());
        $response->assertJsonCount($dataCoutnt, 'data');
    }

    public function test_can_search_videos(): void
    {
        $this->searchAbleVideo = Video::factory()->create(['title' => 'searchable']);

        $response = $this->getJson(route('api.videos.index', ['search' => 'searchable']));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => $this->videos->toArray(),
        ]);

        $response->assertJsonFragment([
            'title' => 'searchable'
        ]);
    }

    public function test_search_string_too_long(): void
    {
        $this->searchAbleVideo = Video::factory()->create(['title' => 'searchable']);

        $response = $this->getJson(route('api.videos.index', ['search' => 'thisisasearchstringwhichwouldbeclassedastolongstrasd']));

        $response->assertStatus(422);

        $response->assertJsonFragment([
            'search' => ['The search field must not be greater than 50 characters.']
        ]);
    }
}
