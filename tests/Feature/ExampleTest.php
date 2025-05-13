<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Article;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testAa()
    {
        Article::create(
            [
                'title' => 'test',
                'content' => 'test',
                'image' => 'test',
                'status' => 'test',
            ]
        );
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
