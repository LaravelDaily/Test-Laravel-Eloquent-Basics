<?php

namespace Tests\Feature;

use App\Models\Morningnews;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentTest extends TestCase
{
    use RefreshDatabase;

    // TASK: Make the model Morningnews work with DB table "morning_news"
    public function test_create_model_incorrect_table()
    {
        $article = ['title' => 'Something', 'news_text' => 'Something'];
        Morningnews::create($article);

        $this->assertDatabaseHas('morning_news', $article);
    }

    // TASK: Write Eloquent query to return the newest 3 verified users
    public function test_get_filtered_list()
    {
        $user1 = User::factory()->create(['created_at' => now()->subMinutes(5)]);
        $user2 = User::factory()->create(['created_at' => now()->subMinutes(4)]);
        $user3 = User::factory()->create(['created_at' => now()->subMinutes(3), 'email_verified_at' => NULL]);
        $user4 = User::factory()->create(['created_at' => now()->subMinutes(2)]);
        $user5 = User::factory()->create(['created_at' => now()->subMinute()]);

        $response = $this->get('users');

        // This one should be filtered by "email_verified_at is not null"
        $response->assertDontSee($user3->name);

        // This one should be filtered out by "limit 3"
        $response->assertDontSee($user1->name);

        // Do we have the correct order?
        $response->assertSee('1. ' . $user5->name);
        $response->assertSee('2. ' . $user4->name);
        $response->assertSee('3. ' . $user2->name); // not $user3
    }

    public function test_find_user_or_show_404_page()
    {
        $response = $this->get('users/1');
        $response->assertStatus(404);

        $user = User::factory()->create();
        $response = $this->get('users/1');
        $response->assertStatus(200);
        $response->assertViewHas('user', $user);
    }

}
