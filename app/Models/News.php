<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// TASK: Define the model's related table as "morning_news"
class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'news_text'];
}
