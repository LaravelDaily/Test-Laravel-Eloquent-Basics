<?php

namespace Tests\Feature;

use App\Models\Morningnews;
use App\Models\News;
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

}
