<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_model_different_table()
    {
        $article = ['title' => 'Something', 'news_text' => 'Something'];
        News::create($article);

        $this->assertDatabaseHas('morning_news', $article);
    }


}
